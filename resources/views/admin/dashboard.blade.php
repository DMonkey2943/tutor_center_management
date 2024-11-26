@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <!-- Monthly Earnings -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="text-success">Gia sư</h6>
                        <h3 class="font-weight-bold">{{ $totalTutors }}</h3>
                        {{-- <i class="icon fas fa-calendar-alt"></i> --}}
                        <a href="{{ route('admin.tutors') }}">>>Danh sách</a>
                    </div>
                </div>
            </div>

            <!-- Annual Earnings -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="text-warning">Gia sư chờ duyệt</h6>
                        <h3 class="font-weight-bold">{{ $totalPendingTutors }}</h3>
                        {{-- <i class="icon fas fa-dollar-sign"></i> --}}
                        <a href="{{ route('admin.approvedTutors') }}">>>Danh sách</a>
                    </div>
                </div>
            </div>

            <!-- Tasks -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="text-success">Phụ huynh</h6>
                        <h3 class="font-weight-bold">{{ $totalParents }}</h3>
                        <a href="{{ route('admin.parents') }}">>>Danh sách</a>
                    </div>
                </div>
            </div>

            <!-- Pending Requests -->
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h6 class="text-success">Lớp học</h6>
                        <h3 class="font-weight-bold">{{ $totalClasses }}</h3>
                        {{-- <i class="icon fas fa-comments"></i> --}}
                        <a href="{{ route('admin.classes') }}">>>Danh sách</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
@endsection
