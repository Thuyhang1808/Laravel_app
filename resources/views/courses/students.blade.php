@extends('layouts.app')

@section('title', 'Danh Sách Sinh Viên')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Danh Sách Sinh Viên và Tổng Số Tín Chỉ</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sinh viên</th>
                        <th>Ngành</th>
                        <th>Email</th>
                        <th>Tổng số tín chỉ</th>
                        <th>Các môn đã đăng ký</th>
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
                            <span class="badge {{ $student->totalCredits() > 18 ? 'bg-danger' : ($student->totalCredits() > 15 ? 'bg-warning' : 'bg-success') }}">
                                {{ $student->totalCredits() }}/18
                            </span>
                        </td>
                        <td>
                            @foreach($student->courses as $course)
                                <span class="badge bg-info">{{ $course->name }} ({{ $course->credits }})</span>
                            @endforeach
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

        {{ $students->links() }}
    </div>
</div>
@endsection