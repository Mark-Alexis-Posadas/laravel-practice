<x-table :headers="[
    'ID',
    'First Name',
    'Middle Name',
    'Last Name',
    'Birthday',
    'Gender',
    'Email',
    'Phone',
    'Address',
    'Action',
]">
    @forelse($personalInformations as $person)
        <x-person-row :person="$person" />
    @empty
        <tr>
            <td colspan="10" class="text-center py-4 text-muted">
                No records found.
            </td>
        </tr>
    @endforelse
</x-table>

<x-pagination :paginator="$personalInformations" />
