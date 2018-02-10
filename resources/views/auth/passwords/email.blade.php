@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title noselect">Reset Password</h5>

                    <br />

                    <form method="post" action="{{ route('password.email') }}">

                        <div class="form-group last">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required
                            />
                        </div>

                        <div class="form-group buttons">
                            <button type="submit" class="btn btn-primary btn-block">
                                Send Password Reset Link
                            </button>
                        </div>

                        {{ csrf_field() }}
                    </form>

                </div>
                <div class="card-footer">

                    <a href="{{ route('login') }}">
                        Login
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
