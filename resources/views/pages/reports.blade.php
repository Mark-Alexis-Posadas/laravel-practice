@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2>Reports</h2>
            <p class="text-muted mb-0">Summary metrics and operational insights for the student system.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Dashboard</a>
    </div>

    <div class="row g-3">
        @foreach ($reportCards as $card)
            <div class="col-md-6 col-xl-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $card['title'] }}</h5>
                        <h2 class="fw-bold mb-2">{{ $card['value'] }}</h2>
                        <p class="text-muted mb-0">{{ $card['description'] }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
