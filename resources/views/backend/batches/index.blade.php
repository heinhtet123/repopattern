@extends('backend.layout.master')

@section('content')
	<div class="row" ng-controller="BatchController as batch">
		 <div class="col-xs-12">
		 	 <div class="box box-danger">

		 	 	<div class="box-header">
		 	 		<div class="col-sm-6">
		 	 			<h3 class="box-title"> Batches of {{ $coursename }} Table</h3>
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
				 	 					<select name="example1_length" ng-model="itemsperpage" ng-change="change()" ng-options="x.value as x.name for x in changeoptions"  aria-controls="example1" class="form-control input-sm">
					 	 					
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

		 	 					<table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
		 	 						<thead>
		 	 							<tr role="row">
		 	 								<th>
		 	 									<a href="" ng-click="sort('id')" >
				 	 								<span ng-show="indexreverse" class="glyphicon glyphicon-arrow-up"></span>  <span ng-show="!indexreverse" class="glyphicon glyphicon-arrow-down"></span>
				 	 								Index
			 	 								</a>
		 	 								
		 	 								</th>

		 	 								<th>
			 	 								<a href="" ng-click="sort('batch_name')" >
				 	 								<span ng-show="reverse" class="glyphicon glyphicon-arrow-up"></span>  <span ng-show="!reverse" class="glyphicon glyphicon-arrow-down"></span>
				 	 								Name
			 	 								</a>
		 	 								</th>
		 	 								
		 	 								<th width="50px">
		 	 									Duration
		 	 								</th>

		 	 								<th width="50px">
		 	 									Fees
		 	 								</th>

		 	 								<th width="50px">
		 	 									Status	
		 	 								</th>


		 	 								<th width="190px">
		 	 								Open/Closed Enrollment
		 	 								</th>
		 	 								<th width="200px">Actions</th>
		 	 							</tr>
		 	 						</thead>
		 	 						<tbody>
		 	 							{{-- @foreach($batches as $batch) --}}
		 	 								<tr ng-cloak ng-repeat="value in data">
			 	 								<td ng-bind='value.batchIndex'></td>
			 	 								<td ng-bind='value.batch_name'></td>
			 	 								<td ng-bind='value.total_months+" months" '></td>
			 	 								<td ng-bind='value.fees'></td>
			 	 								<td> 
			 	 									<span ng-if="value.enrollment_flag" class="badge bg-green">Open</span> 

			 	 									<span ng-if="!value.enrollment_flag" class="badge bg-red">Close</span> 

			 	 								</td>
			 	 								


			 	 								<td ng-if="value.enrollment_flag">
			 	 									<button class="btn btn-danger"  ng-click="opencloseenroll(value.id,false)">
                                                        <i class="fa fa-close"></i>
                                                        Close Enrollment
                                                    </a>
			 	 									 
			 	 								</td>
			 	 								<td ng-if="!value.enrollment_flag">
			 	 									<button class="btn btn-info" ng-click="opencloseenroll(value.id,true)" href="">
                                                        <i class="fa fa-sticky-note-o"></i>
                                                        Open Enrollment
                                                    </a>
			 	 								</td>
			 	 								<td>
			 	 									<a class="btn btn-info" href="">
                                                                <i class="fa fa-btn fa-info-circle"></i>
                                                    </a>
<!--                                                     //@{{  'batch/'+value.id+'/edit' }} -->
                                                    <a class="btn btn-warning" href="
                                                   {{ url('backend/batch') }}@{{ '/'+value.id+'/edit' }}">
                                                          <i class="fa fa-btn fa-edit"></i>
                                                    </a>

                                                     <a class="btn btn-danger" href="">
                                                          <i class="fa fa-btn fa-eraser"></i>
                                                    </a>

			 	 								</td>
		 	 								</tr>
		 	 							{{-- @endforeach --}}
		 	 							
		 	 							{{  MyFunc::shownodata($batches,6) }}

		 	 						</tbody>
		 	 					</table>
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
<!-- <script src="{{ asset('/app/batch/batch.module.js') }}"></script>
<script src="{{ asset('/app/batch/batch.controller.js') }}"></script>
 -->

<script src="{{ asset('/app/controllers/BatchController.js') }}"></script>

 @stop