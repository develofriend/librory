@extends('layouts.app')

@section('page-title', 'Shelves')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Shelves</h2>
            </div>

            <div class="page-actions">
                <button type="button" data-url="{{ route('shelves.add') }}" class="btn btn-primary add-shelf">
                    Add New Shelf
                </button>
            </div>

            <table class="table table-bb">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-right">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($shelves as $shelf)
                        @include('pages.shelves.row')
                    @empty
                        <tr>
                            <td colspan="5" class="text-center active noselect">
                                No shelves yet
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
