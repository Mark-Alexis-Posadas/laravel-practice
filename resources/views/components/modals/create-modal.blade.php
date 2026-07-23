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

                        <x-form.input col="col-md-4" name="first_name" label="First Name" required
                            data-parsley-required-message="First name is required." data-parsley-minlength="2"
                            data-parsley-minlength-message="Minimum of 2 characters." data-parsley-maxlength="50" />
                        <x-form.input col="col-md-4" name="middle_name" label="Middle Name" />

                        <x-form.input col="col-md-4" name="last_name" label="Last Name" required
                            data-parsley-required-message="Last name is required." data-parsley-minlength="2" />

                        <x-form.input col="col-md-6" type="date" name="birthday" label="Birthday" required
                            data-parsley-required-message="Birthday is required." />

                        <x-form.select col="col-md-6" name="gender" label="Gender" :options="[
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]" required />

                        <x-form.input col="col-md-6" type="email" name="email" label="Email" required
                            data-parsley-type="email" data-parsley-type-message="Please enter a valid email address." />

                        <x-form.input col="col-md-6" name="phone" label="Phone" required
                            data-parsley-pattern="^09\d{9}$"
                            data-parsley-pattern-message="Enter a valid Philippine mobile number." />

                        <x-form.textarea name="address" label="Address" required data-parsley-minlength="10"
                            data-parsley-minlength-message="Address should be at least 10 characters." />
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
