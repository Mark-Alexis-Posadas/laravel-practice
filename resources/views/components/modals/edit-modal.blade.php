<div class="modal fade" id="editPersonModal{{ $person->id }}" tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content rounded-4 border-0 shadow">

            <div class="modal-header bg-warning">

                <h5 class="modal-title">
                    Edit Personal Information
                </h5>

                <button class="btn-close" data-bs-dismiss="modal">
                </button>

            </div>

            <form action="{{ route('personal-information.update', $person) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="modal-body">

                    <div class="row g-3">

                        <x-form.input col="col-md-4" name="first_name" label="First Name" :value="$person->first_name" required />

                        <x-form.input col="col-md-4" name="middle_name" label="Middle Name" :value="$person->middle_name" />

                        <x-form.input col="col-md-4" name="last_name" label="Last Name" :value="$person->last_name" required />

                        <x-form.input col="col-md-6" type="date" name="birthday" label="Birthday" :value="$person->birthday"
                            required />

                        <x-form.select col="col-md-6" name="gender" label="Gender" :value="$person->gender" :options="[
                            'Male' => 'Male',
                            'Female' => 'Female',
                        ]"
                            required />

                        <x-form.input col="col-md-6" type="email" name="email" label="Email" :value="$person->email"
                            required />

                        <x-form.input col="col-md-6" name="phone" label="Phone" :value="$person->phone" required />

                        <x-form.textarea name="address" label="Address" :value="$person->address" required />

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-check-circle-fill me-1"></i>
                        Update Person
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>
