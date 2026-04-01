<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Models\Enrollment;
use App\Http\Requests\CourseRequest;
use App\Http\Requests\EnrollmentRequest;
use Illuminate\Http\Request;

class CourseRegistrationController extends Controller
{
    public function index()
    {
        $enrollments = Enrollment::with(['student', 'course'])->paginate(10);
        return view('courses.index', compact('enrollments'));
    }

    public function createStudent()
    {
        return view('courses.create');
    }

    public function storeStudent(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
        ]);

        Student::create($request->all());

        return redirect()->route('courses.register')
            ->with('success', 'Thêm sinh viên thành công!');
    }

    public function createCourse()
    {
        return view('courses.create');
    }

    public function storeCourse(CourseRequest $request)
    {
        Course::create($request->validated());

        return redirect()->route('courses.register')
            ->with('success', 'Thêm môn học thành công!');
    }

    public function showRegisterForm()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('courses.register', compact('students', 'courses'));
    }

    public function register(EnrollmentRequest $request)
    {
        $student = Student::find($request->student_id);
        $course = Course::find($request->course_id);

        // Check if already registered
        if ($student->courses()->where('course_id', $course->id)->exists()) {
            return redirect()->back()
                ->with('error', 'Sinh viên đã đăng ký môn học này!')
                ->withInput();
        }

        // Check total credits
        $currentCredits = $student->totalCredits();
        if ($currentCredits + $course->credits > 18) {
            return redirect()->back()
                ->with('error', 'Tổng số tín chỉ vượt quá 18! Hiện tại: ' . $currentCredits . ' tín chỉ')
                ->withInput();
        }

        Enrollment::create($request->validated());

        return redirect()->route('courses.index')
            ->with('success', 'Đăng ký môn học thành công!');
    }

    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('courses.index')
            ->with('success', 'Hủy đăng ký thành công!');
    }

    public function listStudents()
    {
        $students = Student::with('courses')->paginate(10);
        return view('courses.students', compact('students'));
    }
}