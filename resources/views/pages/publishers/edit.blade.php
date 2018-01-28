@extends('layouts.app')

@section('page-title', 'Edit Publisher')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-center">
            <div class="form-container">

                @include('components.errors')

                <div class="page-header">
                    <h3>Edit Publisher</h3>
                </div>

                <form action="{{ $publisher->updateUrl() }}" method="post" autocomplete="off">

                    <div class="form-group">
                        <label for="p-name">Name</label>
                        <input type="text" id="p-name" name="name" class="form-control" required
                            value="{{ old('name', $publisher->name) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="p-email">Email</label>
                        <input type="email" id="p-email" name="email" class="form-control"
                            value="{{ old('email', $publisher->email) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="p-contact-number">Contact Number</label>
                        <input type="text" id="p-contact-number" name="contact_number" class="form-control" required
                            value="{{ old('contact_number', $publisher->contact_number) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="p-address">Address</label>
                        <input type="text" id="p-address" name="address" class="form-control" required
                            value="{{ old('address', $publisher->address) }}"
                        />
                    </div>

                    <div class="form-group buttons">
                        <button type="submit" class="btn btn-primary">
                            Submit Changes
                        </button>
                        <a href="{{ route('members.all') }}" class="btn btn-link">
                            Cancel
                        </a>
                    </div>

                    {{ csrf_field() }}
                </form>

            </div>
            </div>

        </div>
    </div>
</div>
@endsection
