@extends('backend.layout.master')

@section('content')
<div class="row">	
	<div class="col-xs-12">
		<div class="box box-danger">

		 	 	<div class="box-header">
		 	 		<div class="col-sm-6">
		 	 			<h3 class="box-title"> Batch {{ $batch_info->batch_name }} </h3>
		 	 		</div>
		 	 		<div class="col-sm-6">
		 	 			<a class="btn btn-success pull-right" href="">
		 	 				Create Batch
                        </a>	
		 	 		</div>
		 	 		
		 	 	</div>

		 	 	<div class="box-body">
		 	 		<div class="col-sm-12">
			 	 			<form role="form" action="{{ route('backend.batch.update') }}" method="post">
			 	 		 	{{ csrf_field() }}

			 	 		 	 	@if($errors->has('batch_name'))
				                    <div class="form-group has-feedback has-error">
				                        <label class="control-label" for="name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('batch_name') }}</label>
				                        @else
				                    <div class="form-group">
				                        <label for="name">Batch Name</label>
				                        @endif
				                        
				                        <input type="text" name="batch_name" class="form-control" id="name" placeholder="Enter Your Batch Name" value="{{ $batch_info->batch_name }}">

				                    </div>

				                    


				                    <div class="form-group">
				                        <label for="name">Course</label>
				                       
				                        
				                        <select  name="course_id" class="form-control" id="name" placeholder="Enter Your Batch Name">
				                        	 @foreach($courses as $course) 
				                        	  	@if($course->name==$batch_info->course->name)
				                        		<option value="{{$course->id}}" selected> {{ $course->name }} </option>
				                        		@else
				                        		<option value="{{$course->id}}"> {{ $course->name }} </option>
				                        		@endif
				                        	 @endforeach
				                        </select>                      
				                    </div>

				                   
				                    <div class="form-group">
				                        <label for="start_month">Start Month</label>
				                       
				                        <div class="input-group date">
				                            <div class="input-group-addon">
				                                <i class="fa fa-calendar" ></i>
				                            </div>

				                            <input name="start_month" type="text" value="{{ $batch_info->start_month }}" class="form-control" id="startdatepicker" autocomplete="off" data-date-format="dd/mm/yyyy" required>
				                            
				                        </div>
				                       
				                    </div>

				                    <div class="form-group">
				                        <label for="start_month">End Month</label>
				                       
				                        <div class="input-group date">
				                            <div class="input-group-addon">
				                                <i class="fa fa-calendar" ></i>
				                            </div>

				                            <input name="end_month" type="text" value="{{ $batch_info->end_month }}" class="form-control" id="enddatepicker" autocomplete="off" data-date-format="dd/mm/yyyy" required>
				                            
				                        </div>
				                       
				                    </div>


			 	 			</form>
	

		 	 		</div>
		 	 	</div>
		 </div>
	</div>

	
</div>
@stop


@section('js')
<script src="{{ asset('/app/controllers/EnrolledStudentsController.js') }}"></script>
@stop


@section("scripts")

<script>
    $('#startdatepicker').datepicker({
      autoclose: true
      
    });

    $('#enddatepicker').datepicker({
      autoclose: true
    });


    

</script>
@stop