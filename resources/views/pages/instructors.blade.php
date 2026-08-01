@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2>Instructors</h2>
            <p class="text-muted mb-0">View the teaching team and their assigned departments.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Dashboard</a>
    </div>

    <div class="row g-3">
        @foreach ($instructors as $instructor)
            <div class="col-md-6 col-xl-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $instructor['name'] }}</h5>
                        <p class="text-muted mb-1">Department: {{ $instructor['department'] }}</p>
                        <p class="mb-0">Email: {{ $instructor['email'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
