@extends('layouts.app')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{route('login')}}" method="POST">
                @csrf
                <div class="form-group has-feedback">
                    <input name="identity" type="text"
                           class="form-control{{ $errors->has('email') || $errors->has('no_identitas') ? ' is-invalid' : '' }}"
                           placeholder="Email">
                    @if ($errors->has('no_identitas') || $errors->has('email'))
                        <span class="invalid-feedback">
                        <strong>{{ $errors->first('no_identitas') ?: $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4 pull-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <a href="#">I forgot my password</a><br>
            <a href="register.html" class="text-center">Register a new membership</a>

        </div>
        <!-- /.login-box-body -->
    </div>

@endsection
