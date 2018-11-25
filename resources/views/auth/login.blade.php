@extends('layouts.app')

@section('content')


<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/auth/login') }}"><b>Student</b>Portal</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    
    <!-- <form action="../../index2.html" method="post"> -->
    <form role="form" method="POST" action="{{ url('/auth/login') }}">
    {!! csrf_field() !!}
      @if($errors->has('email'))
        <div class="form-group has-feedback has-error">
        <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>
          @else
        <div class="form-group has-feedback">
          @endif
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>

      @if($errors->has('password'))
        <div class="form-group has-feedback has-error">
        <label class="control-label" for="password"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>
          @else
        <div class="form-group has-feedback">
          @endif
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="{{ url('/auth/register') }}" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
@endsection