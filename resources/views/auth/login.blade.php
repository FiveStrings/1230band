@extends('layouts.html')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <form class="form-signin" method="post" action="{{ url('auth/login') }}">
                {!! csrf_field() !!}
                <h2 class="form-signin-heading">Please sign in</h2>

                <div class="form-group @if($errors->has('email')) has-error @endif">
                    <label for="email" class="sr-only">Email address</label>
                    <input type="email" name="email" class="form-control" placeholder="Email address" value="{{ old('email') }}"required autofocus>
                    <span id="helpBlock" class="help-block">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group @if($errors->has('password')) has-error @endif">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span id="helpBlock" class="help-block">{{ $errors->first('password') }}</span>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </div>
@endsection