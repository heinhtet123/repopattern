@extends('backend.layout.master')

@section('content')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Edit A Role</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ url('backend/role/' . $role->id) }}" method="POST">
            <div class="box-body">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                @if($errors->has('name'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="name">Name</label>
                        @endif
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your UserName" value="{{ $role->name }}">
                    </div>

                
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Edit</button>
                <a href="{{ route('backend.role.index') }}" class="btn btn-default">Cancel</a>
            </div>
            </div>
        </form>
    </div>
@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('students.edit') !!}
@stop
