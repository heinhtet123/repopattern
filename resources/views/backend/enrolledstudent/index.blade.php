@extends('backend.layout.master')
@section('content')
	<div class="row" ng-controller="EnrolledStudentsController as es">
	 	<div class="col-xs-12">
	 		<div class="box box-danger">

		 	 	<div class="box-header">
		 	 		<div class="col-sm-12">
		 	 			<h3 class="box-title"> Enrolled Students </h3>
		 	 		</div>
		 	 	</div>

		 	 	<div class="box-body">
		 	 		<div class="dataTables_wrapper form-inline dt-bootstrap">

		 	 			<div class="row">
		 	 				<div class="col-sm-12">
		 	 					<div align="center" class="form-group">

		 	 						<select  ng-change="es.coursechange(es.coursevalue)" ng-model="es.coursevalue" ng-options="x.id as x.name for x in es.course" class="form-control">
	 									<option  value="" hidden>--Please select Course--</option>
	 	 							</select>
			 	 					
			 	 				

			 	 					<select ng-model="es.eachbatch" ng-change="es.batchchange(es.eachbatch)" class="form-control" ng-disabled="es.isDisable" ng-options="x.id as x.batch_name for x in es.allbatches">
			 	 					<option  value="" hidden>--Please select A Batch--</option>
			 	 					</select>

		 	 					</div>
		 	 				</div>
		 	 			</div>
		 	 			</br>
		 	 				
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

		 	 			<div class="row" ng-if="es.enrolleddata!=undefined">
		 	 				<div class="col-sm-6">

			 	 					<div class="dataTables_length" id="example1_length">
				 	 					<label>Show 
				 	 					<select name="example1_length" ng-model="es.itemsperpage" ng-change="es.change()" ng-options="x.value as x.name for x in es.changeoptions"  aria-controls="example1" class="form-control input-sm">
					 	 					
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

		 	 			<div class="row" ng-if="es.enrolleddata!=undefined">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                       
                                       <ul uib-pagination total-items="TotalItems" items-per-page='itemsperpage' ng-model="currentpage" max-size="maxSize" class="pagination-sm" boundary-link-numbers="true" rotate="false" ng-click="setPage(currentpage)" num-pages="numPages"></ul>

                                    </div>
                                </div>
                        </div>

                        <div class="row" ng-if="es.enrolleddata!=undefined">
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
			 	 								<a href="" ng-click="sort('name')" >
				 	 								<span ng-show="indexreverse" class="glyphicon glyphicon-arrow-up"></span>  <span ng-show="!indexreverse" class="glyphicon glyphicon-arrow-down"></span>
				 	 								Name
			 	 								</a>
			 	 							</th>
			 	 							<th>
			 	 								<a href="" ng-click="sort('name')" >
				 	 								<span ng-show="indexreverse" class="glyphicon glyphicon-arrow-up"></span>  <span ng-show="!indexreverse" class="glyphicon glyphicon-arrow-down"></span>
				 	 								Email
			 	 								</a>
			 	 							</th>
			 	 							
			 	 							<th>Payment Status</th>
			 	 							<th>Payment</th>
			 	 							<th>Action</th>
                        				</tr>
                        			</thead>

                        			<tbody>
                        			
                        				<tr  ng-repeat="value in es.enrolleddata">

			 	 								<td ng-bind='value.index'></td>
			 	 								<td ng-bind='value.name'></td>
			 	 								<td ng-bind='value.email'></td>
			 	 								

			 	 								<td>
			 	 									<span ng-if="value.status==0" class="badge bg-red">
			 	 										Not pay yet
			 	 										<i class="fa fa-close"></i>
			 	 									</span>
			 	 									<span ng-if="value.status==1" class="badge bg-orange">
                                                        To Pay
                                                        <i class="fa fa-close"></i>
                                                    </span>
                                                
                                                    <span ng-if="value.status==2" class="badge bg-green">Paid <i class="fa fa-check"></i></span> 

			 	 									 
			 	 								</td>
			 	 								<td>

	 	 									<select ng-init="value.enrolledstudents_id = value.status"  ng-click="es.paymentchange(value.enrolledstudents_id,value)" ng-model="value.enrolledstudents_id" ng-options="x.name as x.value for x in es.paymentoptions" ng-disabled="value.disable" class="form-control">
	 											 <option  value="" hidden >--Please select Payment--</option>
	 	 									</select>
			 	 								</td>


			 	 								<td>
			 	 									<button class="btn bg-purple" ng-click="es.undo(value)">Undo <i class="fa fa-undo"></i></button>

			 	 								</td>

			 	 						</tr>
                        			</tbody>
                        		</table>
                        	</div>
                        </div>

                        <div class="row" ng-if="es.enrolleddata!=undefined">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                       
                                       <ul uib-pagination total-items="TotalItems" items-per-page='itemsperpage' ng-model="currentpage" max-size="maxSize" class="pagination-sm" boundary-link-numbers="true" rotate="false" ng-click="setPage(currentpage)" num-pages="numPages"></ul>

                                    </div>
                                </div>
                        </div>

                        <pre ng-if="es.enrolleddata!=undefined" ng-bind="'Page:'+currentpage+'/'+numPages"></pre>


                        <script type="text/ng-template" id="myModalContent.html">
                        			 <div class="modal-header">
							            <h3 class="modal-title" id="modal-title">Partial Pay for @{{$ctrl.selected.item.batch_name}}</h3>
							        </div>
							        <div class="modal-body" id="modal-body">
							        	 
							        	<div class="form-group">
					                        <label for="name">Enrolled Student Name: </label>
					                        <b class="ng-binding" ng-bind=" $ctrl.selected.item.name"></b>
				                        
					                    </div>
					                    <div class="form-group">
					                        <label for="name">Email: </label>
					                        <b class="ng-binding" ng-bind=" $ctrl.selected.item.email"></b>
				                        
					                    </div>
							         	
							           	<div class="form-group">
					                        <label for="name">Phone: </label>
					                        <b class="ng-binding" ng-bind=" $ctrl.selected.item.phone"></b>
				                        
					                    </div>
					                    <div class="form-group">
					                        <label for="name">Course Fees: </label>
					                        <b class="ng-binding" ng-bind=" $ctrl.selected.item.fees + ' kyats'"></b>
				                        
					                    </div>
					                    <div class="form-group">
					                        <label for="name">Enrolled Student Paid Fees: </label>

					                        <b class="ng-binding" ng-bind=" $ctrl.selected.item.student_bill + ' kyats'"></b>
				                        
					                    </div>

					                    <div class="form-group">
					                        <label for="name">Left to Pay </label>

					                        <b class="ng-binding" ng-bind="$ctrl.selected.item.fees-$ctrl.selected.item.student_bill + ' kyats'"></b>
				                        
					                    </div>

					                    
					                    <form name="form">
					                    <div class="form-group">
					                        <label for="name">Payment Fees: </label>
					                        <input type="number" name="paymentfees" filterblock class="ng-binding" ng-maxlength="@{{ $ctrl.limit_letter }}" ng-model="feestopay" required ng-init="feestopay=1"></b>

					                        <span id="toolong" class="error" ng-show="form.paymentfees.$error.maxlength">Too long!</span>

					                        <span id="exceed" class="error ng-hide">Exceed!</span>
				                        
					                    </div>
					                   

							        </div>

							        <div class="modal-footer">
							            <button class="btn btn-primary" type="button" ng-click="$ctrl.ok()" ng-disabled="checked">Pay</button>
							            <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
							        </div>
							         </form>
                        </script>


		 	 		</div>
		 	 	</div>
	 		</div>
	 	</div>
	</div>




@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('enrolled students') !!}
@stop

@section('js')
<script src="{{ asset('/app/controllers/EnrolledStudentsController.js') }}"></script>
<script src="{{ asset('/app/directives/block.js') }}"></script>
@stop