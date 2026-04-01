<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CourseRegistrationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BookingController;

// Bài 1: Quản lý sinh viên
Route::resource('students', StudentController::class)->except(['edit', 'update', 'show']);

// Bài 2: Quản lý sản phẩm
Route::resource('products', ProductController::class)->except(['edit', 'update', 'show']);
Route::put('products/{product}/update-stock', [ProductController::class, 'updateStock'])->name('products.update-stock');

// Bài 3: Đăng ký môn học
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/', [CourseRegistrationController::class, 'index'])->name('index');
    Route::get('/register', [CourseRegistrationController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [CourseRegistrationController::class, 'register'])->name('register-submit');
    Route::post('/store-student', [CourseRegistrationController::class, 'storeStudent'])->name('store-student');
    Route::post('/store-course', [CourseRegistrationController::class, 'storeCourse'])->name('store-course');
    Route::get('/students', [CourseRegistrationController::class, 'listStudents'])->name('students');
    Route::delete('/{enrollment}', [CourseRegistrationController::class, 'destroy'])->name('destroy');
});

// Bài 4: Hệ thống đơn hàng
Route::resource('orders', OrderController::class)->except(['edit', 'update']);
Route::put('orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');

// Bài 5: Hệ thống đặt lịch
Route::resource('bookings', BookingController::class)->except(['edit', 'update', 'show']);
Route::put('bookings/{appointment}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});
