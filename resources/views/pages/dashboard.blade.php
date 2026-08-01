@extends('layouts.app')

@section('content')
    <div class="row g-3 mb-4">
        <x-dashboard-card title="Total Persons" :count="$totalPeople" icon="bi-people-fill" color="primary" />
        <x-dashboard-card title="Male" :count="$totalMale" icon="bi-gender-male" color="success" />
        <x-dashboard-card title="Female" :count="$totalFemale" icon="bi-gender-female" color="danger" />
        <x-dashboard-card title="Deleted" :count="$totalDeleted" icon="bi-trash-fill" color="dark" />
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2>Dashboard</h2>
            <p class="text-muted mb-0">A quick look at student activity and system health.</p>
        </div>
        <a href="{{ route('students') }}" class="btn btn-primary">Go to Students</a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Recent Student Activity</h5>
                    <p class="text-muted">Review the newest student records added to the system.</p>
                    <ul class="list-group list-group-flush">
                        @forelse($recentStudents as $student)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $student->first_name }} {{ $student->last_name }}</strong>
                                    <div class="text-muted small">ID #{{ $student->id }}</div>
                                </div>
                                <span class="badge bg-primary rounded-pill">{{ $student->gender }}</span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">No recent student records available.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">System Insights</h5>
                    <p class="text-muted">Use the sidebar links to manage courses, subjects, instructors, enrollments, and
                        reports.</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="bg-light rounded p-3 text-center">
                                <h4>{{ $totalPeople }}</h4>
                                <p class="mb-0 text-muted">Active students</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="bg-light rounded p-3 text-center">
                                <h4>{{ optional($recentStudents->first())->created_at?->format('M d') ?? '—' }}</h4>
                                <p class="mb-0 text-muted">Latest update</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="alert alert-info mb-0">
                                <strong>Tip:</strong> Visit the Students page to search and manage records directly.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
