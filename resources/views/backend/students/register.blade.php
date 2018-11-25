@extends('backend.layout.master')

@section('content')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Student</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('backend.student.store') }}" method="post">
            <div class="box-body">
                {{ csrf_field() }}
                @if($errors->has('name'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="name">UserName</label>
                        @endif
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your UserName">
                    </div>

                @if($errors->has('email'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>
                        @else
                    <div class="form-group">
                        <label for="email">Email address</label>
                        @endif
                        <input name="email" type="email" class="form-control" id="email" placeholder="Enter email">
                    </div>

                @if($errors->has('phone'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="phone"><i class="fa fa-times-circle-o"></i> {{ $errors->first('phone') }}</label>
                        @else
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        @endif
                        <input name="phone" type="tel" class="form-control" id="phone" placeholder="Enter Phone Number">
                    </div>

                @if($errors->has('password'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="password"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password') }}</label>
                        @else
                    <div class="form-group">
                        <label for="password">Password</label>
                        @endif
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password">
                    </div>

                @if($errors->has('password_confirmation'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="password_confirmation"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password_confirmation') }}</label>
                        @else
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        @endif
                        <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                    </div>

                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('backend.student.index') }}" class="btn btn-default">Cancel</a>
                    </div>
            </div>
        </form>
    </div>
@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('students.create') !!}
@stop
