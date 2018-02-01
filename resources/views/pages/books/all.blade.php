@extends('layouts.app')

@section('page-title', 'Books')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Books</h2>
            </div>

            <div class="page-actions">
                <a href="{{ route('books.add') }}" class="btn btn-primary">
                    Add New Book
                </a>
            </div>

            <table class="table table-bb">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th class="text-right">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                    @include('pages.books.row')
                @empty
                    <tr>
                        <td colspan="2" class="text-center active noselect">
                            No books yet
                        </td>
                    </tr>
                @endforelse
            </tbody>
            </table>

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
