@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2>Courses</h2>
            <p class="text-muted mb-0">Manage course details and monitor enrollment growth across programs.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Dashboard</a>
    </div>

    <div class="row g-3">
        @foreach ($courses as $course)
            <div class="col-md-6 col-xl-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course['name'] }}</h5>
                        <p class="text-muted mb-2">Code: {{ $course['code'] }}</p>
                        <p class="mb-0">Current enrollment: <strong>{{ $course['students'] }}</strong></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
