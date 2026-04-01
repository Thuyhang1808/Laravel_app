@extends('layouts.app')

@section('title', 'Chi Tiết Đơn Hàng')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Chi Tiết Đơn Hàng #{{ $order->id }}</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <p><strong>Tên khách hàng:</strong> {{ $order->customer_name }}</p>
                <p><strong>Ngày tạo:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                <p><strong>Trạng thái:</strong> <span class="badge bg-{{ $order->status_badge_class }}">{{ $order->status_text }}</span></p>
            </div>
            <div class="col-md-6 text-end">
                <p><strong>Tổng tiền:</strong> <span class="h4 text-primary">{{ number_format($order->total) }} VNĐ</span></p>
            </div>
        </div>

        <h5>Danh sách sản phẩm</h5>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->price) }} VNĐ</td>
                        <td>{{ number_format($item->quantity * $item->price) }} VNĐ</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-info">
                        <th colspan="4" class="text-end">Tổng cộng:</th>
                        <th>{{ number_format($order->total) }} VNĐ</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="mt-3">
            <a href="{{ route('orders.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection