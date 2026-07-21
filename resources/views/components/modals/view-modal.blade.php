@props(['person'])


<div class="modal fade"
    id="viewPersonModal{{ $person->id }}"
    tabindex="-1"
    aria-hidden="true">


    <div class="modal-dialog modal-lg modal-dialog-centered">


        <div class="modal-content shadow-lg border-0 rounded-4">


            <div class="modal-header bg-secondary text-white">


                <h4 class="modal-title">

                    <i class="bi bi-person-circle me-2"></i>
                    Personal Information

                </h4>


                <button
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>


            </div>



            <div class="modal-body">


                <div class="table-responsive">


                    <table class="table table-bordered">


                        <tr>
                            <th width="200">ID</th>
                            <td>{{ $person->id }}</td>
                        </tr>


                        <tr>
                            <th>First Name</th>
                            <td>{{ $person->first_name }}</td>
                        </tr>


                        <tr>
                            <th>Middle Name</th>
                            <td>{{ $person->middle_name }}</td>
                        </tr>


                        <tr>
                            <th>Last Name</th>
                            <td>{{ $person->last_name }}</td>
                        </tr>


                        <tr>
                            <th>Birthday</th>
                            <td>{{ $person->birthday }}</td>
                        </tr>


                        <tr>
                            <th>Gender</th>
                            <td>{{ $person->gender }}</td>
                        </tr>


                        <tr>
                            <th>Email</th>
                            <td>{{ $person->email }}</td>
                        </tr>


                        <tr>
                            <th>Phone</th>
                            <td>{{ $person->phone }}</td>
                        </tr>


                        <tr>
                            <th>Address</th>
                            <td>{{ $person->address }}</td>
                        </tr>


                    </table>


                </div>


            </div>



            <div class="modal-footer">


                <button
                    type="button"
                    class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">

                    Close

                </button>


            </div>


        </div>


    </div>


</div>