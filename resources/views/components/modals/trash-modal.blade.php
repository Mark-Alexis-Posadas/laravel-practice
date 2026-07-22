<div class="modal fade" id="trashModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header border-0 bg-dark text-white">

                <h5 class="modal-title fw-bold">
                    <i class="bi bi-trash3-fill me-2"></i>
                    Deleted Persons
                </h5>

                <span class="badge bg-danger rounded-pill">
                    {{ $deletedPeople->count() }} Archived
                </span>

                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>

            </div>

            <div class="modal-body">

                @forelse($deletedPeople as $person)
                    <div class="border rounded-4 p-3 mb-3 bg-light shadow-sm">

                        <div class="d-flex justify-content-between align-items-center">

                            <div class="d-flex align-items-center gap-3">

                                <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center fw-bold"
                                    style="width:55px;height:55px;font-size:18px;">

                                    {{ strtoupper(substr($person->first_name, 0, 1)) }}
                                    {{ strtoupper(substr($person->last_name, 0, 1)) }}

                                </div>

                                <div>

                                    <h6 class="fw-bold mb-1">
                                        {{ $person->first_name }}
                                        {{ $person->middle_name }}
                                        {{ $person->last_name }}
                                    </h6>

                                    <div class="small text-muted">

                                        <span class="badge bg-primary">
                                            {{ $person->gender }}
                                        </span>

                                        •

                                        {{ \Carbon\Carbon::parse($person->birthday)->format('M d, Y') }}

                                    </div>

                                    <div class="small text-muted mt-1">
                                        <i class="bi bi-envelope me-1"></i>
                                        {{ $person->email }}
                                    </div>

                                    <div class="small text-muted mt-1">
                                        <i class="bi bi-clock-history me-1 text-danger"></i>

                                        Deleted:
                                        <strong>
                                            {{ $person->deleted_at->format('M d, Y • h:i A') }}
                                        </strong>

                                        <br>

                                        <span class="text-secondary">
                                            {{ $person->deleted_at->diffForHumans() }}
                                        </span>
                                    </div>

                                </div>

                            </div>

                            <div class="d-flex gap-2">

                                <form action="{{ route('personal-information.restore', $person->id) }}" method="POST">
                                    @csrf

                                    <button class="btn btn-success rounded-pill px-3">
                                        <i class="bi bi-arrow-counterclockwise me-1"></i>
                                        Restore
                                    </button>
                                </form>

                                <form action="{{ route('personal-information.force-delete', $person->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-outline-danger rounded-pill px-3">
                                        <i class="bi bi-trash3 me-1"></i>
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="text-center py-5">

                        <i class="bi bi-trash display-2 text-secondary"></i>

                        <h5 class="fw-bold mt-3">
                            Trash is Empty
                        </h5>

                        <p class="text-muted">
                            No deleted records found.
                        </p>

                    </div>
                @endforelse

            </div>

        </div>
    </div>
</div>
