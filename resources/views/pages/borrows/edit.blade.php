@extends('layouts.app')

@section('page-title', 'Borrowed Books')
@section('body-class', 'w-fixed-sidebar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h5>Member's Info</h5>
                <h2>{{ $user->name }}</h2>

                <article class="pt-2">
                    {{ $user->contact_number }} &middot; {{ $user->email }}
                </article>
            </div>

            <form action="{{ $borrow->updateUrl() }}" method="post" autocomplete="off">

                <div class="fixed-sidebar">
                    <div id="books-list"
                        data-url="{{ route('borrow.books.fetch', [
                            'borrow' => $borrow->id,
                            'books' => implode(',', $borrow->book_ids)
                        ]) }}">
                        <i class="fas fa-circle-notch fa-spin text-primary"></i>&nbsp; Fetching Books
                    </div>
                </div>

                <div class="form-group last">
                    <label for="b-return-date">Return Date</label>
                    <input type="date" id="b-return-date" name="return_date"
                        class="form-control" required
                        min="{{ \Carbon\Carbon::now()->addDay()->toDateString() }}"
                        value="{{ old('return_date', $borrow->return_date->toDateString()) }}"
                    />
                </div>

                <div class="form-group buttons">
                    <button type="submit" class="btn btn-primary">Submit Changes</button>
                    <a href="{{ route('borrow.all') }}" class="btn btn-link">Cancel</a>
                </div>

            {!! csrf_field() !!}
            </form>

        </div>
    </div>
</div>
@endsection

@section('footer-addon')
<script>
$(function () {

    @include('components.status')

    fetchBooks();

});

function fetchBooks()
{
    var container = $('#books-list'),
        url = container.data('url');

    $.get(url)
        .done(function (r) {
            if (r.count > 0) {
                container.html(r.list);
            }
        })
        .fail(function (r) {
            container.html('Error while trying to fetch books.');
        });
}
</script>
@endsection
