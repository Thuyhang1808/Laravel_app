@extends('layouts.app')

@section('title', 'Trang Chủ - Hệ Thống Quản Lý')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0 text-center">HỆ THỐNG QUẢN LÝ TỔNG HỢP</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Bài 1: Quản lý sinh viên -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-users fa-4x text-primary mb-3"></i>
                                    <h4>Quản Lý Sinh Viên</h4>
                                    <p class="text-muted">Thêm, xóa, tìm kiếm, sắp xếp sinh viên</p>
                                    <hr>
                                    <div class="text-start small">
                                        <ul class="list-unstyled">
                                            <li>✓ Thêm sinh viên mới</li>
                                            <li>✓ Tìm kiếm theo tên</li>
                                            <li>✓ Sắp xếp theo tên</li>
                                            <li>✓ Phân trang dữ liệu</li>
                                            <li>✓ Email không trùng</li>
                                        </ul>
                                    </div>
                                    @if (Route::has('students.index'))
                                        <a href="{{ route('students.index') }}" class="btn btn-primary mt-2">
                                            <i class="fas fa-arrow-right"></i> Truy cập
                                        </a>
                                    @else
                                        <button class="btn btn-secondary mt-2" disabled>Chưa sẵn sàng</button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Bài 2: Quản lý sản phẩm -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-box fa-4x text-success mb-3"></i>
                                    <h4>Quản Lý Sản Phẩm</h4>
                                    <p class="text-muted">Quản lý kho hàng, cập nhật tồn kho</p>
                                    <hr>
                                    <div class="text-start small">
                                        <ul class="list-unstyled">
                                            <li>✓ Thêm sản phẩm mới</li>
                                            <li>✓ Cập nhật tồn kho</li>
                                            <li>✓ Xóa sản phẩm</li>
                                            <li>✓ Hiển thị trạng thái</li>
                                            <li>✓ Tìm kiếm theo tên</li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('products.index') }}" class="btn btn-success mt-2">
                                        <i class="fas fa-arrow-right"></i> Truy cập
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Bài 3: Đăng ký môn học -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-book fa-4x text-info mb-3"></i>
                                    <h4>Đăng Ký Môn Học</h4>
                                    <p class="text-muted">Đăng ký môn học, quản lý tín chỉ</p>
                                    <hr>
                                    <div class="text-start small">
                                        <ul class="list-unstyled">
                                            <li>✓ Thêm sinh viên/môn học</li>
                                            <li>✓ Đăng ký môn học</li>
                                            <li>✓ Không cho đăng ký trùng</li>
                                            <li>✓ Giới hạn 18 tín chỉ</li>
                                            <li>✓ Tính tổng tín chỉ</li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('courses.index') }}" class="btn btn-info mt-2">
                                        <i class="fas fa-arrow-right"></i> Truy cập
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Bài 4: Hệ thống đơn hàng -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-shopping-cart fa-4x text-warning mb-3"></i>
                                    <h4>Quản Lý Đơn Hàng</h4>
                                    <p class="text-muted">Tạo đơn hàng, quản lý trạng thái</p>
                                    <hr>
                                    <div class="text-start small">
                                        <ul class="list-unstyled">
                                            <li>✓ Tạo đơn hàng nhiều sản phẩm</li>
                                            <li>✓ Tính tổng tiền tự động</li>
                                            <li>✓ Cập nhật trạng thái</li>
                                            <li>✓ Xem chi tiết đơn hàng</li>
                                            <li>✓ Không cho đơn rỗng</li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('orders.index') }}" class="btn btn-warning mt-2">
                                        <i class="fas fa-arrow-right"></i> Truy cập
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Bài 5: Hệ thống đặt lịch -->
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="fas fa-calendar-alt fa-4x text-danger mb-3"></i>
                                    <h4>Đặt Lịch Hẹn</h4>
                                    <p class="text-muted">Quản lý lịch hẹn, kiểm tra trùng lịch</p>
                                    <hr>
                                    <div class="text-start small">
                                        <ul class="list-unstyled">
                                            <li>✓ Đặt lịch mới</li>
                                            <li>✓ Hủy lịch</li>
                                            <li>✓ Kiểm tra trùng lịch</li>
                                            <li>✓ Không đặt quá khứ</li>
                                            <li>✓ Hiển thị trạng thái màu</li>
                                        </ul>
                                    </div>
                                    <a href="{{ route('bookings.index') }}" class="btn btn-danger mt-2">
                                        <i class="fas fa-arrow-right"></i> Truy cập
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">
                    <small>Hệ thống quản lý tổng hợp - 5 bài tập thực hành Laravel</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection