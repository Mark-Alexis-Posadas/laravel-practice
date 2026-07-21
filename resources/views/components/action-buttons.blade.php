@props(['person'])

<div class="btn-group btn-group-sm" role="group">
<button
    type="button"
    class="btn btn-secondary"
    data-bs-toggle="modal"
    data-bs-target="#viewPersonModal{{ $person->id }}">

    View

</button>


<x-modals.view-modal :person="$person" />
   <button
        type="button"
        class="btn btn-warning"
        data-bs-toggle="modal"
        data-bs-target="#editPersonModal{{ $person->id }}">
        Edit
    </button>
    <button
        type="button"
        class="btn btn-danger"
        data-bs-toggle="modal"
        data-bs-target="#deletePersonModal{{ $person->id }}">
        Delete
    </button>
</div>