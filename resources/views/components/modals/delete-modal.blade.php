<div class="modal fade" id="deletePersonModal{{ $person->id }}" tabindex="-1">

    <div class="modal-dialog modal-dialog-centered">

        <div class="modal-content">


            <div class="modal-header bg-danger text-white">

                <h5 class="modal-title">
                    Confirm Delete
                </h5>

                <button 
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                Are you sure you want to delete 
                <strong>
                    {{ $person->first_name }} {{ $person->last_name }}
                </strong>?

                <br>

                <small class="text-muted">
                    This action cannot be undone.
                </small>

            </div>


            <div class="modal-footer">


                <button 
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal">
                    Cancel
                </button>



                <form action="{{ route('personal-information.destroy', $person) }}"
                      method="POST">

                    @csrf
                    @method('DELETE')


                    <button 
                        type="submit"
                        class="btn btn-danger">
                        Yes, Delete
                    </button>


                </form>


            </div>


        </div>

    </div>

</div>