@props(['person'])

<tr id="person-{{ $person->id }}"
    class="{{ session('updated_id') == $person->id ? 'table-success' : '' }}">
    <td>{{ $person->id }}</td>
    <td>{{ $person->first_name }}</td>
    <td>{{ $person->middle_name }}</td>
    <td>{{ $person->last_name }}</td>
    <td>{{ $person->birthday }}</td>
    <td>{{ $person->gender }}</td>
    <td>{{ $person->email }}</td>
    <td>{{ $person->phone }}</td>
    <td>{{ $person->address }}</td>
    <td class="text-center">
        <x-action-buttons :person="$person" />
    </td>
</tr>
