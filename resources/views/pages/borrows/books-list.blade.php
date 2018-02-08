<ul class="list-group">
    @forelse ($books as $book)
        @if ($book->total_count > 0)
            <li class="list-group-item">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="book-{{ $book->id }}"
                        value="{{ $book->id }}" name="books[]"
                    />
                    <label class="custom-control-label d-block" for="book-{{ $book->id }}">
                        <span class="float-right ml-3">
                            <strong>{{ $book->total_count }}</strong>
                        </span>
                        <span class="text-primary">
                            {{ $book->title }}
                        </span>
                        @if (count($book->authors) > 0)
                            <br />
                            <small>
                                @foreach ($book->authors as $author)
                                    @if (! $loop->first), @endif
                                    {{ $author->name }}
                                @endforeach
                            </small>
                        @endif
                    </label>
                </div>
            </li>
        @endif
    @empty
        <li class="list-group-item noselect">
            No available books
        </li>
    @endforelse
</ul>
