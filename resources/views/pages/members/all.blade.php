@extends('layouts.app')

@section('page-title', 'Members')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="page-header">
                <h2>Members</h2>
            </div>

            <div class="page-actions">
                <a href="{{ route('members.add') }}" class="btn btn-primary">
                    Add New Member
                </a>
            </div>

            <table class="table table-bb">
            <thead>
                <tr>
                    <th scope="col">Name</th>
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
