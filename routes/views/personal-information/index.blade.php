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

    </tbody>

</table>

@endsection