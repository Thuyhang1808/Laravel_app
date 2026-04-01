@extends('layouts.app')

@section('title', 'Đặt Lịch')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Quản Lý Lịch Hẹn</h3>
    </div>
    <div class="card-body">
        <div class="mb-3">
            @if (Route::has('students.index'))
                                        <a href="{{ route('students.index') }}" class="btn btn-primary mt-2">
                                            <i class="fas fa-arrow-right"></i> Truy cập
                                        </a>
                                    @else
                                        <button class="btn btn-secondary mt-2" disabled>Chưa sẵn sàng</button>
                                    @endif
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Ngày</th>
                        <th>Giờ</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->id }}</td>
                        <td>{{ $appointment->customer->name }}</td>
                        <td>{{ $appointment->customer->phone ?? 'Chưa cập nhật' }}</td>
                        <td>{{ $appointment->date->format('d/m/Y') }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>
                            <span class="badge bg-{{ $appointment->status_badge_class }}">
                                {{ $appointment->status_text }}
                            </span>
                        </td>
                        <td>
                            @if($appointment->status == 'active')
                            <form action="{{ route('bookings.cancel', $appointment) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Bạn có chắc muốn hủy lịch?')">
                                    <i class="fas fa-times"></i> Hủy lịch
                                </button>
                            </form>
                            @endif
                            <form action="{{ route('bookings.destroy', $appointment) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">
                                    <i class="fas fa-trash"></i> Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $appointments->links() }}
    </div>
</div>
@endsection