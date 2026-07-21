@extends('layouts.app')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">
        <h3>Personal Information</h3>

        <a href="{{ route('personal-information.index') }}"
            class="btn btn-secondary">
            Back
        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <tr>
                <th width="200">ID</th>
                <td>{{ $personalInformation->id }}</td>
            </tr>

            <tr>
                <th>First Name</th>
                <td>{{ $personalInformation->first_name }}</td>
            </tr>

            <tr>
                <th>Middle Name</th>
                <td>{{ $personalInformation->middle_name }}</td>
            </tr>

            <tr>
                <th>Last Name</th>
                <td>{{ $personalInformation->last_name }}</td>
            </tr>

            <tr>
                <th>Birthday</th>
                <td>{{ $personalInformation->birthday }}</td>
            </tr>

            <tr>
                <th>Gender</th>
                <td>{{ $personalInformation->gender }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $personalInformation->email }}</td>
            </tr>

            <tr>
                <th>Phone</th>
                <td>{{ $personalInformation->phone }}</td>
            </tr>

            <tr>
                <th>Address</th>
                <td>{{ $personalInformation->address }}</td>
            </tr>

        </table>

    </div>

</div>

@endsection