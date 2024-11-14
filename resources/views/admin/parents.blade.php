@extends('admin.layouts.app')
@section('title', 'Danh sách Phụ huynh')
@section('content')
    <!-- Table Container -->
    <div class="table-container mt-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Mã PH</th>
                    <th>Họ tên PH</th>
                    <th>Email</th>
                    <th>SĐT</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($parents as $pr)
                    <tr>
                        <td>{{ $pr->pr_id }}</td>
                        <td>{{ $pr->user->name }}</td>
                        <td>{{ $pr->user->email }}</td>
                        <td>{{ $pr->user->phone }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
    </div>
@endsection
