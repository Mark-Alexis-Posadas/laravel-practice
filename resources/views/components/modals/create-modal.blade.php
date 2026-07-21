<div class="modal fade"
    id="createPersonModal"
    tabindex="-1">

    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content shadow-lg border-0 rounded-4">

            <div class="modal-header bg-secondarytext-white">

                <h4 class="modal-title">
                    <i class="bi bi-person-plus-fill me-2"></i>
                    Add Personal Information
                </h4>

                <button
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form action="{{ route('personal-information.store') }}"
                method="POST">

                @csrf

                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-md-4">

                            <div class="form-floating">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="first_name"
                                    id="first_name"
                                    placeholder="First Name"
                                    required>

                                <label>First Name</label>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-floating">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="middle_name"
                                    placeholder="Middle Name">

                                <label>Middle Name</label>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="form-floating">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="last_name"
                                    placeholder="Last Name"
                                    required>

                                <label>Last Name</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">

                                <input
                                    type="date"
                                    class="form-control"
                                    name="birthday"
                                    required>

                                <label>Birthday</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">

                                <select
                                    class="form-select"
                                    name="gender"
                                    required>

                                    <option value="">Select</option>
                                    <option>Male</option>
                                    <option>Female</option>

                                </select>

                                <label>Gender</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">

                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    placeholder="Email"
                                    required>

                                <label>Email</label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-floating">

                                <input
                                    type="text"
                                    class="form-control"
                                    name="phone"
                                    placeholder="Phone"
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
                                    placeholder="Address"
                                    required></textarea>

                                <label>Address</label>

                            </div>

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button
                        type="button"
                        class="btn btn-outline-secondary"
                        data-bs-dismiss="modal">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="bi bi-check-circle-fill me-1"></i>

                        Save Person

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>