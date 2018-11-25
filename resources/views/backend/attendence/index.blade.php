@extends('backend.layout.master')

@section('content')
	<div class="row" ng-controller="AttendenceController as at">
		 <div class="col-xs-12">
		 	 <div class="box box-danger">

		 	 	<div class="box-header">
		 	 		<div class="col-sm-6">
		 	 			<h3 class="box-title"> Attendence of  Table</h3>
		 	 		</div>
		 	 		<div class="col-sm-6">
		 	 			<a class="btn btn-success pull-right" href="">
		 	 				Create Batch
                        </a>	
		 	 		</div>
		 	 		
		 	 	</div>

		 	 	
		 	 	

		 	 	<div class="box-body">
		 	 		<div class="dataTables_wrapper form-inline dt-bootstrap">
		 	 			
		 	 			<div class="row">


			 	 			
			 	 			<div class="col-sm-12">
			 	 				@if(Session::has('flash_message'))
								    <div class="alert alert-success alert-dismissible">
								    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

								        {{ Session::get('flash_message') }}
								    </div>
								@endif
							</div>
		 	 			</div>


		 	 			<div class="row">
		 	 				<div class="col-sm-6">

			 	 					<div class="dataTables_length" id="example1_length">
				 	 					<label>Show
				 	 					<select name="example1_length" ng-model="at.itemsperpage" ng-change="change()" ng-options="x.value as x.name for x in at.changeoptions"  aria-controls="example1" class="form-control input-sm">
					 	 					
				 	 					</select> entries

				 	 					</label>

				 	 					<button class="btn btn-info" ng-click="exportcsv()">Export Excel</button>
		 	 						</div>
		 	 				</div>

		 	 				<div class="col-sm-6">
		 	 					<form class="form-inline pull-right" ng-submit="submit()">
									  <div class="form-group">
									    <label for="exampleInputName2">Batch Name</label>
									    <input type="text" class="form-control" id="exampleInputName2" ng-model="search_name" placeholder="Please type Name">
									  	
									  	<select class="form-contorl">
									  		 <option>hi</option>
									  		 <option>helloworld</option>
									  	</select>
									  </div>
									 
									  <button type="submit" ng class="btn btn-default">Filter</button>
								</form>
		 	 					
		 	 				</div>

		 	 			</div>
		 	 			
		 	 			<div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                       
                                       <ul uib-pagination total-items="TotalItems" items-per-page='itemsperpage' ng-model="currentpage" max-size="maxSize" class="pagination-sm" boundary-link-numbers="true" rotate="false" ng-click="setPage(currentpage)" num-pages="numPages"></ul>

                                    </div>
                                </div>
                        </div>

                        <div class="row">
	                         <div class="col-sm-12">
	                        	<select  ng-change="at.coursechange(at.coursevalue)" ng-model="at.coursevalue" ng-options="x.id as x.name for x in at.course" class="form-control">
		 									<option  value="" hidden>--Please select Course--</option>
		 	 					</select>

		 	 					<select ng-model="at.eachbatch" ng-change="at.batchchange(at.eachbatch)" class="form-control" ng-disabled="at.isDisable" ng-options="x.id as x.batch_name for x in at.allbatches">
				 	 					<option  value="" hidden>--Please select A Batch--</option>
				 	 			</select>

				 	 			<select ng-model="at.eachmonth" ng-change="at.monthchange(at.eachmonth)" class="form-control" ng-disabled="at.monthDisable" ng-options="x for x in at.allmonths">
				 	 					<option  value="" hidden>--Please select A Month--</option>
				 	 			</select>
				 	 		</div>
                        </div>

                      <!--   <div class="row">
                        	<div class="col-sm-@{{at.width}}" ng-repeat="value in at.months">
                        		
                        		<div align="center" class="form-group">
                        			<a href="" ng-click="at.clickmonth(value)" ng-bind="value"></a>
                        		</div>
                        	</div>

                        </div> -->

		 	 			<div class="row">
		 	 				<div class="col-sm-12">
		 	 				<div class="span1">
		 	 					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" >
		 	 						<thead>
		 	 							<tr role="row">
		 	 								<th></th>
		 	 								<th>
		 	 									<a href="" ng-click="sort('id')" >
				 	 								<span ng-show="indexreverse" class="glyphicon glyphicon-arrow-up"></span>  <span ng-show="!indexreverse" class="glyphicon glyphicon-arrow-down"></span>
				 	 								Index
			 	 								</a>
		 	 								
		 	 								</th>

		 	 								<th ng-repeat="value in at.unidate" ng-bind="value.attendence_date">
		 	 									
		 	 								</th>
		 	 								 
		 	 							</tr>
		 	 						</thead>
		 	 						<tbody>
		 	 							
		 	 						
		 	 							
		 	 								<tr ng-repeat="user in at.usersdata">
		 	 									<td><a href="" class="btn btn-info">Details</a></td>
		 	 									<td ng-bind="user.name">
		 	 										
		 	 									</td>
		 	 									<td ng-repeat="value in at.indexdata | attendencedate:user.id">
		 	 										
		 	 										

		 	 									<input ng-change="at.onChangeattendence(value.id)" ng-checked="@{{value.status}}"   type="checkbox" ng-model="at.attendence_ids[value.id]">	 
		 	 										<!-- </div> -->
		 	 										
		 	 									</td>

		 	 								</tr>
		 	 							
		 	 							
		 	 						</tbody>
		 	 					</table>
		 	 				</div>
		 	 				</div>
		 	 			</div>

		 	 			<div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                       
                                       <ul uib-pagination total-items="TotalItems" items-per-page='itemsperpage' ng-model="currentpage" max-size="maxSize" class="pagination-sm" boundary-link-numbers="true" rotate="false" ng-click="setPage(currentpage)" num-pages="numPages"></ul>

                                    </div>
                                </div>
                        </div>
                        <pre ng-bind="'Page:'+currentpage+'/'+numPages"></pre>


		 	 		</div>
		 	 	</div>

		 	 </div>

		 	 
		 </div>
	</div>
@stop

@section('js')

<script src="{{ asset('/app/controllers/AttendenceController.js') }}"></script>
<script src="{{ asset('/app/filters/attendencefilter.js') }}"></script>
 @stop