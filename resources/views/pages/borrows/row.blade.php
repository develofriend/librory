<tr id="borrow-{{ $borrowedBook->id }}">
    <td>
        <a href="#">
            <strong>{{ $borrowedBook->user->name }}</strong>
        </a>
    </td>
    <td>
        <a href="#">
            {{ $borrowedBook->books_count }}
        </a>
    </td>
    <td>
        {{ $borrowedBook->return_date->format('F j, Y') }}
    </td>
    <td>
        {{ ucwords($borrowedBook->status) }}
    </td>
    <td class="text-right">
        <a href="#">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </a>
        <a href="#">
            <i class="fas fa-ellipsis-h fa-fw"></i>
        </a>
    </td>
</tr>
