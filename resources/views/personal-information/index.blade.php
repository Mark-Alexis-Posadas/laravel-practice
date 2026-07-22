@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Personal Information</h2>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPersonModal">
            <i class="bi bi-person-plus-fill"></i>
            Add Person
        </button>
    </div>

    <div class="card mb-3">

        <div class="card-body">

            <form method="GET">

                <div class="row g-2 align-items-end">

                    <div class="col-md-3">

                        <label class="form-label">Search</label>

                        <input type="text" name="search" class="form-control" placeholder="Search name, email..."
                            value="{{ request('search') }}">

                    </div>

                    <div class="col-md-2">

                        <label class="form-label">Gender</label>

                        <select name="gender" class="form-select">

                            <option value="">All Gender</option>

                            <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>

                            <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>

                        </select>

                    </div>

                    <div class="col-md-3">

                        <label class="form-label">Sort By</label>

                        <select name="sort" class="form-select">

                            <option value="">Newest</option>

                            <optgroup label="ID">
                                <option value="id_asc" {{ request('sort') == 'id_asc' ? 'selected' : '' }}>
                                    ID (Lowest → Highest)
                                </option>

                                <option value="id_desc" {{ request('sort') == 'id_desc' ? 'selected' : '' }}>
                                    ID (Highest → Lowest)
                                </option>
                            </optgroup>

                            <optgroup label="Name">
                                <option value="first_name_asc" {{ request('sort') == 'first_name_asc' ? 'selected' : '' }}>
                                    First Name (A-Z)
                                </option>

                                <option value="first_name_desc"
                                    {{ request('sort') == 'first_name_desc' ? 'selected' : '' }}>
                                    First Name (Z-A)
                                </option>
                            </optgroup>

                            <optgroup label="Birthday">
                                <option value="birthday_asc" {{ request('sort') == 'birthday_asc' ? 'selected' : '' }}>
                                    Birthday (Oldest)
                                </option>

                                <option value="birthday_desc" {{ request('sort') == 'birthday_desc' ? 'selected' : '' }}>
                                    Birthday (Newest)
                                </option>
                            </optgroup>

                        </select>

                    </div>

                    <div class="col-md-1 d-grid">

                        <button class="btn btn-primary">
                            Search
                        </button>

                    </div>

                    <div class="col-md-3">

                        <div class="d-flex justify-content-end gap-2">

                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#importExcelModal">

                                <i class="bi bi-upload me-1"></i>
                                Import

                            </button>

                            <a href="{{ route('personal-information.export') }}" class="btn btn-outline-success">

                                <i class="bi bi-download me-1"></i>
                                Export

                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>
    {{-- Dynamic Table Component --}}
    <x-table :headers="[
        'ID',
        'First Name',
        'Middle Name',
        'Last Name',
        'Birthday',
        'Gender',
        'Email',
        'Phone',
        'Address',
        'Action',
    ]">
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
    @include('components.modals.import-excel-modal')
@endsection
