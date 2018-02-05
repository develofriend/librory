<tr id="book-{{ $book->id }}">
    <td>
        <a href="#">
            <strong>{{ $book->title }}</strong>
        </a>
    </td>
    <td>
        @foreach ($book->authors as $author)
            @if (! $loop->first), @endif
            <a href="#">{{ $author->name }}</a>
        @endforeach
    </td>
    <td>
        <a href="#">
            {{ $book->publisher->name }}
        </a>
    </td>
    <td>
        @foreach ($book->categories as $category)
            @if (! $loop->first), @endif
            <a href="#">{{ $category->name }}</a>
        @endforeach
    </td>
    <td>{{ $book->total_count }}</td>
    <td class="text-right">
        <a href="{{ $book->editUrl() }}">
            <i class="fas fa-pencil-alt fa-fw"></i>
        </a>
    </td>
</tr>
