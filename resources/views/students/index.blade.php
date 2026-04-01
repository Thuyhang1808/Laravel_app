@extends('layouts.app')

@section('title', 'Quản Lý Sinh Viên')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Quản Lý Sinh Viên</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{ route('students.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Thêm Sinh Viên
                </a>
            </div>
            <div class="col-md-6">
                <form method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Tìm theo tên..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Tìm</button>
                </form>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>
                            Tên
                            <a href="?sort=asc&search={{ request('search') }}" class="btn btn-sm btn-link">↑</a>
                            <a href="?sort=desc&search={{ request('search') }}" class="btn btn-sm btn-link">↓</a>
                        </th>
                        <th>Ngành</th>
                        <th>Email</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->major }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
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
                        <td colspan="5" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $students->appends(request()->query())->links() }}
    </div>
</div>
@endsection