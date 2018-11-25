@extends('layouts.app')
@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{ url('/auth/login') }}"><b>Student</b>Portal</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <form action="{{ url('/auth/register') }}" method="post">

      {!! csrf_field() !!}
      @if($errors->has('name'))
        <div class="form-group has-feedback has-error">
          <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
          @else
        <div class="form-group has-feedback">
          @endif
        <input name="name" type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      @if($errors->has('email'))
        <div class="form-group has-feedback has-error">
          <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>
        @else
        <div class="form-group has-feedback">
        @endif
        <input type="email" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      @if($errors->has('password'))
        <div class="form-group has-feedback has-error">
          <label class="control-label" for="password"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>
        @else
        <div class="form-group has-feedback">
        @endif
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      @if($errors->has('password'))
        <div class="form-group has-feedback has-error">
          <label class="control-label" for="password_confirmation"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>
        @else
        <div class="form-group has-feedback">
        @endif
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      

     
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="{{ url('/auth/login') }}" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
@endsection