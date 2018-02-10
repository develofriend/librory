@extends('layouts.app')

@section('page-title', 'Borrowed Books')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h5>Member's Info</h5>
                <h2 class="font-weight-bold">{{ $borrow->user->name }}</h2>

                <article class="pt-2">
                    {{ $borrow->user->contact_number }} &middot; {{ $borrow->user->email }}

                    <br />
                    <br />

                    @if ($borrow->status == 'unreturned')
                        <span class="badge badge-warning" style="font-size: 100%;">{{ ucfirst($borrow->status) }}</span>
                    @endif
                    &nbsp;
                    <strong>Return Date: {{ $borrow->return_date->format('F j, Y') }}</strong>
                </article>
            </div>

            <h5>Borrowed Books</h5>
            <table class="table table-bb">
                <tbody>
                    @foreach ($borrow->books as $book)
                        <tr>
                            <td>
                                <a href="#">
                                    <strong>{{ $book->title }}</strong>
                                </a>
                                @if (count($book->authors) > 0)
                                    <br />
                                    <small>
                                        @foreach ($book->authors as $author)
                                            @if (! $loop->first), @endif
                                            {{ $author->name }}
                                        @endforeach
                                    </small>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="form-group buttons">
                <a href="#" class="btn btn-primary">Mark as Returned</a>
                <a href="{{ $borrow->editUrl() }}" class="btn btn-link">Edit</a>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer-addon')
<script>
$(function () {

    @include('components.status')

});
</script>
@endsection
