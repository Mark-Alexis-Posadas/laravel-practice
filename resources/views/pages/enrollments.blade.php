@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2>Enrollments</h2>
            <p class="text-muted mb-0">Track student enrollment status for current programs.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Dashboard</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <x-table :headers="['Student', 'Program', 'Status', 'Date']">
                @foreach ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment['student'] }}</td>
                        <td>{{ $enrollment['program'] }}</td>
                        <td>{{ $enrollment['status'] }}</td>
                        <td>{{ $enrollment['date'] }}</td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
@endsection
