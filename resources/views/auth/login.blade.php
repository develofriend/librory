@extends('layouts.app')

@section('page-title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">

            @include('components.errors')

            <div class="card">
                <div class="card-body">

                    <h5 class="card-title noselect">Login</h5>

                    <br />

                    <form method="post" action="{{ route('login') }}" autocomplete="off">

                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password" required />
                        </div>

                        <div class="form-group last">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember-me"
                                name="remember" {{ old('remember') ? 'checked' : '' }}
                                />
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div>

                        <div class="form-group buttons">
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                        </div>

                        {{ csrf_field() }}
                    </form>

                </div>
                <div class="card-footer">

                    <a href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
