@extends('backend.layout.master')

@section('content')


    

    <div class="box box-danger" ng-controller="GroupRegisterController as grp">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Blog</h3>
        </div><!-- /.box-header -->

        <!-- form start -->
        <form role="form" action="{{ route('backend.blog.store') }}" method="post" enctype="multipart/form-data">
            <div class="box-body">
                {{ csrf_field() }}


                @if($errors->has('email'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i> {{ $errors->first('email') }}</label>
                        @else
                    <div class="form-group">
                        <label for="email">Group Name</label>
                        @endif
                        <input type="text" name="group_name" class="form-control">
                      
                    </div>

                @if($errors->has('name'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="name">Batch</label>
                        @endif
                        <select class="form-control">
                            <option selected>Please choose a batch</option>
                            <option>hi</option>
                            <option>nothing</option>
                        </select>
                       
                    </div>

                <autocomplete data="grp.data"  tag="grp.showtag"  on-key="grp.keyup(event)" on-close="grp.taggedRemove(index)"></autocomplete>




                @if($errors->has('password_confirmation'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="password_confirmation"><i class="fa fa-times-circle-o"></i> {{ $errors->first('password_confirmation') }}</label>
                        @else
                    <div class="form-group">
                        <label for="password_confirmation">Group Image</label>
                        @endif

                        <div style="border: 2px dashed #d2d6de;padding: 20px">
                            
                                <div class="row text-center">
                                    <div class="col-sm-12"><h3>Drag And Drop</h3></div>
                                </div>
                                <div class="row text-center">
                                    <div class="col-sm-12"><h5>OR</h5></div>
                                </div>
                                 <div class="row text-center">

                                    <div class="btn btn-primary btn-md btn-file" >
                                        Browse
                                        <input name="group_img" ng-file-model="files" type="file" class="form-control"  multiple>
                                        

                                    </div>

                                    <div class="previewing">
                                     </div>

                                </div>

                        </div>
                        

                        <p ng-repeat="file in files">
                           <!--  <img  name="image" src=@{{ file.url }} /> -->
                        </p>
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
    {!! Breadcrumbs::render('groups.create') !!}
@stop

@section('js')
<script src="{{ asset('/app/controllers/GroupController.js') }}"></script>
<script src="{{ asset('/app/directives/file.js')}}"></script>
<script src="{{ asset('/app/directives/autocomplete.js')}}"></script>

@stop