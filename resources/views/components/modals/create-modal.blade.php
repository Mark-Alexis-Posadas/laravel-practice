<div class="modal fade" id="createPersonModal" tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content shadow-lg border-0 rounded-4">

            <div class="modal-header bg-secondarytext-white">

                <h4 class="modal-title">
                    <i class="bi bi-person-plus-fill me-2"></i>
                    Add Personal Information
                </h4>

                <button class="btn-close btn-close-white" data-bs-dismiss="modal">
                </button>

            </div>
            <form id="personForm" action="{{ route('personal-information.store') }}" method="POST">

                @csrf

                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-md-4">

                            <div class="form-floating">

                                <input type="text" class="form-control" name="first_name" required
                                    data-parsley-required-message="First name is required." data-parsley-minlength="2"
                                    data-parsley-minlength-message="Minimum of 2 characters."
                                    data-parsley-maxlength="50">

                                <label>First Name</label>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-floating">

                                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">

                                <label>Middle Name</label>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-floating">

                                <input type="text" class="form-control" name="last_name" required
                                    data-parsley-required-message="Last name is required." data-parsley-minlength="2">

                                <label>Last Name</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">

                                <input type="date" class="form-control" name="birthday" required
                                    data-parsley-required-message="Birthday is required.">

                                <label>Birthday</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">

                                <select class="form-select" name="gender" required>

                                    <option value="">Select</option>
                                    <option>Male</option>
                                    <option>Female</option>

                                </select>

                                <label>Gender</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" required
                                    data-parsley-type="email"
                                    data-parsley-type-message="Please enter a valid email address."
                                    data-parsley-required-message="Email is required.">

                                <label>Email</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">
                                <input type="text" class="form-control" name="phone" required
                                    data-parsley-pattern="^09\d{9}$"
                                    data-parsley-pattern-message="Enter a valid Philippine mobile number.">

                                <label>Phone</label>

                            </div>

                        </div>

                        <div class="col-12">

                            <div class="form-floating">

                                <textarea class="form-control" name="address" required data-parsley-minlength="10"
                                    data-parsley-minlength-message="Address should be at least 10 characters.">
</textarea>

                                <label>Address</label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button type="submit" class="btn btn-primary">

                        <i class="bi bi-check-circle-fill me-1"></i>

                        Save Person

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
