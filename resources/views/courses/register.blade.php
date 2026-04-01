@extends('layouts.app')

@section('title', 'Đăng Ký Môn Học')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                <h4>Thêm Sinh Viên Mới</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.store-student') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên sinh viên</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ngành học</label>
                        <input type="text" name="major" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Sinh Viên</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header">
                <h4>Thêm Môn Học Mới</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('courses.store-course') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Tên môn học</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Số tín chỉ</label>
                        <input type="number" name="credits" class="form-control" required min="1" max="10">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm Môn Học</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4>Đăng Ký Môn Học</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('courses.register-submit') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Chọn sinh viên</label>
                <select name="student_id" class="form-control" required>
                    <option value="">-- Chọn sinh viên --</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->major }}) - Tổng tín chỉ: {{ $student->totalCredits() }}/18</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Chọn môn học</label>
                <select name="course_id" class="form-control" required>
                    <option value="">-- Chọn môn học --</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->credits }} tín chỉ)</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Đăng Ký</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
@endsection