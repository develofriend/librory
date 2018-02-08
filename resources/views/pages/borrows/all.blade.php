@extends('layouts.app')

@section('page-title', 'Borrowed Books')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Borrowed Books</h2>
            </div>

            <div class="page-actions">
                <a href="{{ route('books.add') }}" class="btn btn-primary">
                    New Borrow
                </a>
            </div>

            <table class="table table-bb">
                <thead>
                    <tr>
                        <th scope="col">Member</th>
                        <th scope="col">Books</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Status</th>
                        <th class="text-right">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($borrowedBooks as $borrowedBook)
                        @include('pages.borrows.row')
                    @empty
                        <tr>
                            <td colspan="5" class="text-center active noselect">
                                No borrowed books yet
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="list-pagination">
                {{ $borrowedBooks->links() }}
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
