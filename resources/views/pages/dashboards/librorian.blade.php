@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <h1>Hello, {{ auth()->user()->first_name }}!</h1>

        </div>
    </div>
</div>
@endsection
