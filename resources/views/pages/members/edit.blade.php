@extends('layouts.app')

@section('page-title', 'Edit Member')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="d-flex justify-content-center">
            <div class="form-container">

                @include('components.errors')

                <div class="page-header">
                    <h2>Edit Member</h2>
                </div>

                <form action="{{ $member->updateMemberUrl() }}" method="post" autocomplete="off">

                    <div class="form-group">
                        <label for="m-first-name">First Name</label>
                        <input type="text" id="m-first-name" name="first_name" class="form-control" required
                            value="{{ old('first_name', $member->first_name) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="m-last-name">Last Name</label>
                        <input type="text" id="m-last-name" name="last_name" class="form-control" required
                            value="{{ old('last_name', $member->last_name) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="m-contact-number">Contact Number</label>
                        <input type="text" id="m-contact-number" name="contact_number" class="form-control"
                            value="{{ old('contact_number', $member->contact_number) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="m-address">Address</label>
                        <input type="text" id="m-address" name="address" class="form-control"
                            value="{{ old('address', $member->address) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="m-email">Email</label>
                        <input type="email" id="m-email" name="email" class="form-control" required
                            value="{{ old('email', $member->email) }}"
                        />
                    </div>

                    <div class="form-group">
                        <label for="m-password">Password</label>
                        <input type="password" id="m-password" name="password" class="form-control"
                            placeholder="Leave blank to remain unchanged"
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
