@extends('layouts.app')

@section('page-title', 'Edit Book')

@section('head-addon')
<style>
    .author-field {
        margin-bottom: 1rem;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-center">
            <div class="form-container">

                @include('components.errors')

                <div class="page-header">
                    <h3>Edit Book</h3>
                </div>

                <form action="{{ $book->updateUrl() }}" method="post" autocomplete="off">

                    <div class="form-group">
                        <label for="b-title">Title</label>
                        <input type="text" id="b-title" name="title" class="form-control" required
                            value="{{ old('title', $book->title) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="b-publisher">Publisher</label>
                        <select class="custom-select" name="publisher_id" id="b-publisher">
                            <option></option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}"
                                    @if (old('publisher_id', $book->publisher_id) == $publisher->id) selected @endif
                                >
                                    {{ $publisher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="b-publisher">Categories</label>
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-12 col-md-6 col-lg-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="category-{{ $category->id }}"
                                            value="{{ $category->id }}" name="categories[]"
                                            @if (in_array($category->id, old('categories', $book->bookCategoriesIdToArray()))) checked @endif
                                        />
                                        <label class="custom-control-label" for="category-{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="b-publisher">Author/s</label>
                        <div class="authors-fields">
                            @forelse ($book->bookAuthors as $bookAuthor)
                                <div class="author-field" data-count="{{ $bookAuthor->id }}">
                                    @if ($loop->first)
                                        <input type="text" class="form-control" name="authors[{{ $bookAuthor->id }}]"
                                            required
                                            value="{{ old('authors.' . $bookAuthor->id, $bookAuthor->author->name) }}"
                                        />
                                    @else
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="authors[{{ $bookAuthor->id }}]"
                                                required
                                                value="{{ old('authors.' . $bookAuthor->id, $bookAuthor->author->name) }}"
                                            />
                                            <div class="input-group-append">
                                                <button class="btn btn-primary remove-author" type="button">
                                                        <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <div class="author-field" data-count="1">
                                    <input type="text" class="form-control" name="authors[1]" required
                                        value="{{ old('authors.1') }}"
                                    />
                                </div>
                            @endforelse
                        </div>
                        <button type="button" class="btn btn-primary btn-sm add-author">Add Author</button>
                    </div>

                    <br />

                    <div class="form-group">
                        <label for="b-isbn">ISBN</label>
                        <input type="text" id="b-isbn" name="isbn" class="form-control" required
                            value="{{ old('isbn', $book->isbn) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="b-edition">Edition</label>
                        <input type="text" id="b-edition" name="edition" class="form-control"
                            value="{{ old('edition', $book->edition) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="b-volume">Volume</label>
                        <input type="text" id="b-volume" name="volume" class="form-control"
                            value="{{ old('volume', $book->volume) }}"
                        />
                    </div>

                    <div class="form-group last">
                        <label for="b-issue">Issue</label>
                        <input type="text" id="b-issue" name="issue" class="form-control"
                            value="{{ old('issue', $book->issue) }}"
                        />
                    </div>

                    <div class="form-group buttons">
                        <button type="submit" class="btn btn-primary">
                            Submit Changes
                        </button>
                        <a href="{{ route('books.all') }}" class="btn btn-link">
                            Cancel
                        </a>
                    </div>

                    {{ csrf_field() }}
                </form>

            </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer-addon')
<script>
$(function () {

    $(document)

    // add authors
    .on('click', '.add-author', function (e) {
        e.preventDefault();

        var count = 0;
        $('.author-field').each(function () {
            var index = parseInt($(this).data('count'));
            if (index > count) {
                count = index;
            }
        });

        count++;

        var html = '<div class="author-field" data-count="' + count + '">' +
            '<div class="input-group">' +
            '<input type="text" class="form-control" name="authors[' + count + ']" required />' +
            '<div class="input-group-append">' +
            '<button class="btn btn-primary remove-author" type="button"><i class="fas fa-minus"></i></button>' +
            '</div>' +
            '</div>' +
            '</div>';

        $('.authors-fields').append(html);
    })

    // remove author
    .on('click', '.remove-author', function (e) {
        e.preventDefault();
        $(this).closest('.author-field').remove();
    });

});
</script>
@endsection
