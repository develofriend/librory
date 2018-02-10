@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title noselect">Reset Password</h5>

                    <br />

                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ $email or old('email') }}" required
                            />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required />
                        </div>

                        <div class="form-group last">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required
                            />
                        </div>

                        <div class="form-group buttons">
                            <button type="submit" class="btn btn-primary">
                                Reset Password
                            </button>
                        </div>

                        <input type="hidden" name="token" value="{{ $token }}">
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
