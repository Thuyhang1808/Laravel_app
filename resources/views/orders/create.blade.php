@extends('layouts.app')

@section('title', 'Tạo Đơn Hàng')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Tạo Đơn Hàng Mới</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
            @csrf

            <div class="mb-3">
                <label for="customer_name" class="form-label">Tên khách hàng</label>
                <input type="text" class="form-control @error('customer_name') is-invalid @enderror" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                @error('customer_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Danh sách sản phẩm</label>
                <div id="items-container">
                    <div class="item-row row mb-2">
                        <div class="col-md-5">
                            <input type="text" name="items[0][product_name]" class="form-control" placeholder="Tên sản phẩm" required>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="items[0][quantity]" class="form-control quantity" placeholder="Số lượng" required min="1">
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="items[0][price]" class="form-control price" placeholder="Giá" required min="0">
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger remove-item">Xóa</button>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-success btn-sm mt-2" id="add-item">
                    <i class="fas fa-plus"></i> Thêm sản phẩm
                </button>
            </div>

            <div class="mb-3">
                <label class="form-label">Tổng tiền: </label>
                <span id="total-amount" class="h4 text-primary">0 VNĐ</span>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Tạo đơn hàng</button>
                <a href="{{ route('orders.index') }}" class="btn btn-secondary">Hủy</a>
            </div>
        </form>
    </div>
</div>

<script>
    let itemCount = 1;

    document.getElementById('add-item').addEventListener('click', function() {
        const container = document.getElementById('items-container');
        const newRow = document.createElement('div');
        newRow.className = 'item-row row mb-2';
        newRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" name="items[${itemCount}][product_name]" class="form-control" placeholder="Tên sản phẩm" required>
            </div>
            <div class="col-md-3">
                <input type="number" name="items[${itemCount}][quantity]" class="form-control quantity" placeholder="Số lượng" required min="1">
            </div>
            <div class="col-md-3">
                <input type="number" name="items[${itemCount}][price]" class="form-control price" placeholder="Giá" required min="0">
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger remove-item">Xóa</button>
            </div>
        `;
        container.appendChild(newRow);
        itemCount++;
        attachRemoveEvents();
        attachCalculateEvents();
    });

    function attachRemoveEvents() {
        document.querySelectorAll('.remove-item').forEach(button => {
            button.removeEventListener('click', removeItem);
            button.addEventListener('click', removeItem);
        });
    }

    function removeItem(e) {
        e.target.closest('.item-row').remove();
        calculateTotal();
    }

    function attachCalculateEvents() {
        document.querySelectorAll('.quantity, .price').forEach(input => {
            input.removeEventListener('input', calculateTotal);
            input.addEventListener('input', calculateTotal);
        });
    }

    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.item-row').forEach(row => {
            const quantity = row.querySelector('.quantity')?.value || 0;
            const price = row.querySelector('.price')?.value || 0;
            total += quantity * price;
        });
        document.getElementById('total-amount').innerText = total.toLocaleString() + ' VNĐ';
    }

    attachRemoveEvents();
    attachCalculateEvents();
</script>
@endsection