@props(['person'])

<div class="btn-group btn-group-sm gap-2" role="group">
    <button type="button"
        class="btn btn-secondary"
        data-bs-toggle="modal"
        data-bs-target="#viewPersonModal{{ $person->id }}">
        <i class="fas fa-eye me-1"></i> View
    </button>

    <button type="button"
        class="btn btn-warning"
        data-bs-toggle="modal"
        data-bs-target="#editPersonModal{{ $person->id }}">
        <i class="fas fa-edit me-1"></i> Edit
    </button>

    <button type="button"
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#deletePersonModal{{ $person->id }}">
        <i class="fas fa-trash-alt me-1"></i> Delete
    </button>
</div>