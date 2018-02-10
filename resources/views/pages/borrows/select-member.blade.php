@extends('layouts.app')

@section('page-title', 'Select Member')

@section('head-addon')
<style>
    .list-group-item {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-center">
            <div class="form-container">

                <div class="page-header">
                    <h3>Select Member</h3>
                </div>

                <div class="list-group">
                    @forelse ($members as $member)
                        <a href="{{ $member->newBorrowBookUrl() }}" class="list-group-item list-group-item-action">
                            {{ $member->name }}
                        </a>
                    @empty
                        <li class="list-group-item disabled">
                            No members yet
                        </li>
                    @endforelse
                </div>

            </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer-addon')
<script>
$(function () {

    // $(document)

});
</script>
@endsection
