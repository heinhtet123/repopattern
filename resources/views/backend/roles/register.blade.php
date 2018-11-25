@extends('backend.layout.master')

@section('content')


    
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Create Role</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('backend.role.store') }}" method="post">
            <div class="box-body">
                {{ csrf_field() }}

                @if($errors->has('name'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="name">Role Name</label>
                        @endif
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
                    </div>

                

                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('backend.role.index') }}" class="btn btn-default">Cancel</a>
                    </div>
            </div>
        </form>
    </div>
@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('blogs.create') !!}
@stop
