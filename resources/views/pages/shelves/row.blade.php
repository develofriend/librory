<tr id="shelf-{{ $shelf->id }}">
    <td>
        <a href="#">
            <strong>{{ $shelf->name }}</strong>
        </a>
    </td>
    <td class="text-right">
        <button type="button" class="acting-as-anchor edit-shelf" data-url="{{ $shelf->editUrl() }}">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </button>
    </td>
</tr>
