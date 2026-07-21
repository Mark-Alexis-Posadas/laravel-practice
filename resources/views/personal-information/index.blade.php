@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Personal Information</h2>

    <a href="{{ route('personal-information.create') }}" class="btn btn-primary">
        Add New
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Birthday</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th width="180">Action</th>
        </tr>
    </thead>

   <tbody>

@forelse($personalInformations as $person)

<tr>

    <td>{{ $person->id }}</td>

    <td>{{ $person->first_name }}</td>

    <td>{{ $person->middle_name }}</td>

    <td>{{ $person->last_name }}</td>

    <td>{{ $person->birthday }}</td>

    <td>{{ $person->gender }}</td>

    <td>{{ $person->email }}</td>

    <td>{{ $person->phone }}</td>

    <td>{{ $person->address }}</td>

    <td>

        <a href="#" class="btn btn-warning btn-sm">
            Edit
        </a>

        <button class="btn btn-danger btn-sm">
            Delete
        </button>

    </td>

</tr>

@empty

<tr>

    <td colspan="10" class="text-center">
        No records found.
    </td>

</tr>

@endforelse

</tbody>

</table>

@endsection