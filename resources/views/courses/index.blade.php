@extends('layouts.app')

@section('title', 'Đăng Ký Môn Học')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Danh Sách Đăng Ký Môn Học</h3>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <a href="{{ route('courses.register') }}" class="btn btn-primary">Đăng Ký Môn Học</a>
            <a href="{{ route('courses.students') }}" class="btn btn-info">Danh Sách Sinh Viên</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sinh viên</th>
                        <th>Ngành</th>
                        <th>Môn học</th>
                        <th>Số tín chỉ</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->id }}</td>
                        <td>{{ $enrollment->student->name }}</td>
                        <td>{{ $enrollment->student->major }}</td>
                        <td>{{ $enrollment->course->name }}</td>
                        <td>{{ $enrollment->course->credits }}</td>
                        <td>
                            <form action="{{ route('courses.destroy', $enrollment) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn hủy đăng ký?')">
                                    <i class="fas fa-trash"></i> Hủy
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Không có dữ liệu</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $enrollments->links() }}
    </div>
</div>
@endsection