@extends('layouts.app')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Personal Information</h2>

    <button
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#createPersonModal">
        <i class="bi bi-person-plus-fill"></i>
        Add Person
    </button>
</div>

{{-- Dynamic Table Component --}}
<x-table :headers="['ID', 'First Name', 'Middle Name', 'Last Name', 'Birthday', 'Gender', 'Email', 'Phone', 'Address', 'Action']">
    @forelse($personalInformations as $person)
        <x-person-row :person="$person" />
    @empty
        <tr>
            <td colspan="10" class="text-center py-4 text-muted">
                No records found.
            </td>
        </tr>
    @endforelse
</x-table>

{{-- Pagination Component --}}
<x-pagination :paginator="$personalInformations" />
@include('components.modals.create-modal')
@include('components.modals.edit-modal')
@include('components.modals.view-modal')
@include('components.modals.delete-modal')
@endsection