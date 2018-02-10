@extends('layouts.app')

@section('page-title', 'Categories')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Categories</h2>
            </div>

            <div class="page-actions">
                <a href="{{ route('categories.add') }}" class="btn btn-primary">
                    Add New Category
                </a>
            </div>

            <table class="table table-bb">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Shelf</th>
                    <th class="text-right">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    @include('pages.categories.row')
                @empty
                    <tr>
                        <td colspan="5" class="text-center active noselect">
                            No categories yet
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
