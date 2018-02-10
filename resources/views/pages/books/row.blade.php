<tr id="book-{{ $book->id }}">
    <td>
        <a href="#">
            <strong>{{ $book->title }}</strong>
        </a>
    </td>
    <td>
        @foreach ($book->authors as $author)
            @if (! $loop->first), @endif
            <a href="{{ request()->url() }}?author={{ $author->id }}">{{ $author->name }}</a>
        @endforeach
    </td>
    <td>
        <a href="{{ request()->url() }}?publisher={{ $book->publisher->id }}">
            {{ $book->publisher->name }}
        </a>
    </td>
    <td>
        @foreach ($book->categories as $category)
            @if (! $loop->first), @endif
            <a href="{{ request()->url() }}?category={{ $category->id }}">{{ $category->name }}</a>
        @endforeach
    </td>
    <td>{{ $book->total_available }}</td>
    <td>{{ $book->total_count }}</td>
    <td class="text-right text-nowrap">
        <a href="{{ $book->editUrl() }}">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </a>
        <button type="button" class="acting-as-anchor add-quantity" data-url="{{ $book->addCountUrl() }}">
            <i class="fas fa-plus fa-fw"></i>
        </button>
    </td>
</tr>
