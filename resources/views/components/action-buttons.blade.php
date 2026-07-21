@props(['person'])

<div class="btn-group btn-group-sm" role="group">
    <a href="{{ route('personal-information.show', $person) }}"
        class="btn btn-secondary">
        View
    </a>
    <a href="{{ route('personal-information.edit', $person) }}" class="btn btn-warning">
        Edit
    </a>
    <form action="{{ route('personal-information.destroy', $person) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm rounded-0 rounded-end">
            Delete
        </button>
    </form>
</div>