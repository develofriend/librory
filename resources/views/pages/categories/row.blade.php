<tr id="category-{{ $category->id }}">
    <td>
        <a href="#">
            <strong>{{ $category->name }}</strong>
        </a>
    </td>
    <td>
        @if ($category->shelf)
            <a href="#">
                {{ $category->shelf->name }}
            </a>
        @endif
    </td>
    <td class="text-right">
        <a href="{{ $category->editUrl() }}">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </a>
    </td>
</tr>
