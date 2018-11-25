@extends('backend.layout.master')

@section('content')
	 <div class="row" ng-controller="RolesPermissionController as rp">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Roles Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <select  ng-change="rp.controllerchange(rp.eachcontroller)" ng-model="rp.eachcontroller" ng-options="x for x in rp.controllers" class="form-control">
                                            <option  value="" hidden>--Please select Controller--</option>
                                </select>
                            </div>
                            
                        </div>

                        <div class="row">
                       
                        	<div class="col-sm-12">

                       				<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">

                                                <th ng-show="rp.showRoles">Roles</th>
                                                <th ng-repeat="value in rp.methods" ng-bind="value"></th>


                                               <!--  <th rowspan="1" colspan="1"><a href="{{ route('backend.roles.index',['order'=>'asc']) }}"><span class="glyphicon glyphicon-arrow-up">
                                                    
                                                </span>Name</a>
                                                </th>
                                                
                                                <th rowspan="1" colspan="2">Actions</th> -->
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-repeat="role in rp.roles">
                                                <td ng-bind="role.name"></td>

                                                
                                                <td ng-repeat="value in rp.methodspermission | attendencedate:role.id">

                                                    <input ng-click="rp.methodschange(value.id,value.status)" ng-checked="@{{value.status}}"   type="checkbox" ng-model="rp.checkmethods[value.id]">

                                                </td>
                                            </tr>

                                        </tbody>

                                    </table>
                                </div>
                            </div>

                          

                        </div>
                    </div>

                    

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
@endsection

@section('js')
<script src="{{ asset('/app/controllers/RolesPermissionController.js') }}"></script>
<script src="{{ asset('/app/filters/attendencefilter.js') }}"></script>
@stop