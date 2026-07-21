@props(['person'])

<div class="btn-group btn-group-sm gap-2" role="group">

    {{-- View --}}
    <button type="button" class="btn d-flex justify-content-center align-items-center btn-secondary"
        data-bs-toggle="modal" data-bs-target="#viewPersonModal{{ $person->id }}">
        <i class="fas fa-eye me-1"></i> View
    </button>

    {{-- Edit --}}
    <button type="button" class="btn d-flex justify-content-center align-items-center btn-warning" data-bs-toggle="modal"
        data-bs-target="#editPersonModal{{ $person->id }}">
        <i class="fas fa-edit me-1"></i> Edit
    </button>

    {{-- Delete --}}
    <button type="button" class="btn d-flex justify-content-center align-items-center btn-danger"
        data-bs-toggle="modal" data-bs-target="#deletePersonModal{{ $person->id }}">
        <i class="fas fa-trash-alt me-1"></i> Delete
    </button>

</div>

{{-- Render all modals --}}
<x-modals.view-modal :person="$person" />
<x-modals.edit-modal :person="$person" />
<x-modals.delete-modal :person="$person" />
