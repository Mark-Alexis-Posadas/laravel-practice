@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <div>
            <h2>Students</h2>
            <p class="text-muted mb-0">A complete list of registered students in the system.</p>
        </div>
        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-body p-0">
            <x-table :headers="['ID', 'Name', 'Gender', 'Email', 'Phone', 'Address']">
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->address }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">No students found.</td>
                    </tr>
                @endforelse
            </x-table>
        </div>
    </div>

    {{ $students->links() }}
@endsection
