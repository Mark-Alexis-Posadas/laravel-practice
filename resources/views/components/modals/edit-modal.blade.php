<div class="modal fade"
    id="editPersonModal{{ $person->id }}"
    tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content rounded-4 border-0 shadow">

            <div class="modal-header bg-warning">

                <h5 class="modal-title">
                    Edit Personal Information
                </h5>

                <button
                    class="btn-close"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form
                action="{{ route('personal-information.update', $person) }}"
                method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input
                                    type="text"
                                    name="first_name"
                                    class="form-control"
                                    value="{{ old('first_name', $person->first_name) }}"
                                    required>

                                <label>First Name</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input
                                    type="text"
                                    name="middle_name"
                                    class="form-control"
                                    value="{{ old('middle_name', $person->middle_name) }}">

                                <label>Middle Name</label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-floating">
                                <input
                                    type="text"
                                    name="last_name"
                                    class="form-control"
                                    value="{{ old('last_name', $person->last_name) }}"
                                    required>

                                <label>Last Name</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input
                                    type="date"
                                    name="birthday"
                                    class="form-control"
                                    value="{{ old('birthday', $person->birthday) }}"
                                    required>

                                <label>Birthday</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">

                                <select
                                    name="gender"
                                    class="form-select">

                                    <option
                                        value="Male"
                                        @selected($person->gender == 'Male')>
                                        Male
                                    </option>

                                    <option
                                        value="Female"
                                        @selected($person->gender == 'Female')>
                                        Female
                                    </option>

                                </select>

                                <label>Gender</label>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ old('email', $person->email) }}"
                                    required>

                                <label>Email</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ old('phone', $person->phone) }}"
                                    required>

                                <label>Phone</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating">
                                <textarea
                                    class="form-control"
                                    style="height:120px"
                                    name="address"
                                    required>{{ old('address', $person->address) }}</textarea>

                                <label>Address</label>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                        type="button">

                        Cancel

                    </button>

                    <button
                        class="btn btn-warning"
                        type="submit">

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>