@props(['person'])

<div class="btn-group btn-group-sm" role="group">

    {{-- View --}}
    <button
        type="button"
        class="btn btn-secondary"
        data-bs-toggle="modal"
        data-bs-target="#viewPersonModal{{ $person->id }}">
        View
    </button>

    {{-- Edit --}}
    <button
        type="button"
        class="btn btn-warning"
        data-bs-toggle="modal"
        data-bs-target="#editPersonModal{{ $person->id }}">
        Edit
    </button>

    {{-- Delete --}}
    <button
        type="button"
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#deletePersonModal{{ $person->id }}">
        Delete
    </button>

</div>

{{-- Render all modals --}}
<x-modals.view-modal :person="$person" />
<x-modals.edit-modal :person="$person" />
<x-modals.delete-modal :person="$person" />