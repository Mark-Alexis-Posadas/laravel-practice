@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2>Subjects</h2>
            <p class="text-muted mb-0">Track subject offerings and credit load for each term.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Dashboard</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <x-table :headers="['Subject', 'Code', 'Credits']">
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject['name'] }}</td>
                        <td>{{ $subject['code'] }}</td>
                        <td>{{ $subject['credits'] }}</td>
                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>
@endsection
