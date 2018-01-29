@extends('layouts.app')

@section('page-title', 'Authors')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Authors</h2>
            </div>

            <div class="page-actions">
                <a href="{{ route('authors.add') }}" class="btn btn-primary">
                    Add New Author
                </a>
            </div>

            <table class="table table-bb">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th class="text-right">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                    @include('pages.authors.row')
                @empty
                    <tr>
                        <td colspan="5" class="text-center active noselect">
                            No authors yet
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
