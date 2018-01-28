@extends('layouts.app')

@section('page-title', 'Publishers')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Publishers</h2>
            </div>

            <div class="page-actions">
                <a href="{{ route('publishers.add') }}" class="btn btn-primary">
                    Add New Publisher
                </a>
            </div>

            <table class="table table-bb">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact Number</th>
                        <th class="text-right">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $member)
                        @include('pages.members.row')
                    @empty
                        <tr>
                            <td colspan="5" class="text-center active noselect">
                                No members yet
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
