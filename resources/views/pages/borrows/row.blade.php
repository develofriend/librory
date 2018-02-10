<tr id="borrow-{{ $borrowedBook->id }}">
    <td>
        <a href="#">
            <strong>{{ $borrowedBook->user->name }}</strong>
        </a>
    </td>
    <td>
        <a href="{{ $borrowedBook->detailsUrl() }}">
            {{ $borrowedBook->books_count }}
        </a>
    </td>
    <td>
        <span class="badge badge-{{ $borrowedBook->status_class }}">
            {{ ucwords($borrowedBook->status) }}
        </span>
    </td>
    <td>
        {{ $borrowedBook->return_date->format('F j, Y') }}
    </td>
    <td></td>
    <td class="text-right">
        <a href="{{ $borrowedBook->editUrl() }}">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </a>
        <a href="{{ $borrowedBook->detailsUrl() }}">
            <i class="fas fa-ellipsis-h fa-fw"></i>
        </a>
    </td>
</tr>
