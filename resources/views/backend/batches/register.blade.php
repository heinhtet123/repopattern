@extends('backend.layout.master')

@section('content')

    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Create A Batch</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('backend.batch.store') }}" method="post">
            <div class="box-body">
                {{ csrf_field() }}
                @if($errors->has('batch_name'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="batch_name"><i class="fa fa-times-circle-o"></i> {{ $errors->first('batch_name') }}</label>
                        @else
                    <div class="form-group">
                        <label for="batch_name">Batch Name</label>
                        @endif
                        <input type="text" name="batch_name" class="form-control" id="batch_name" placeholder="Enter Batch Name" required>
                    </div>

                @if($errors->has('start_month'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="start_month"><i class="fa fa-times-circle-o"></i> {{ $errors->first('start_month') }}</label>
                        @else
                    <div class="form-group">
                        <label for="start_month">Start Month</label>
                        @endif
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" ></i>
                            </div>
                             <input name="start_month" type="text" class="form-control" id="startdatepicker" autocomplete="off" data-date-format="dd/mm/yyyy" required>
                        </div>
                       
                    </div>

               
                    @if($errors->has('end_month'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="end_month"><i class="fa fa-times-circle-o"></i> {{ $errors->first('end_month') }}</label>
                        @else
                    <div class="form-group">
                        <label for="end_month">End Month</label>
                        @endif
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                             <input name="end_month" type="text" class="form-control" id="enddatepicker" autocomplete="off" data-date-format="dd/mm/yyyy" required>
                        </div>
                       
                    </div>
                    
                     @if($errors->has('fees'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="fees"><i class="fa fa-times-circle-o"></i> {{ $errors->first('fees') }}</label>
                        @else
                    <div class="form-group">
                        <label for="fees">Fees</label>
                        @endif
                        <input type="text" name="fees" class="form-control" id="fees" placeholder="Enter Batch Fees" required>
                    </div>

                     @if($errors->has('type'))
                    <div class="form-group has-feedback has-error">
                        <label class="control-label" for="fees"><i class="fa fa-times-circle-o"></i> {{ $errors->first('type') }}</label>
                        @else
                    <div class="form-group">
                        <label for="fees">Type</label>
                        @endif
                        <select name="type" class="form-control">
                            <option value="Weekend">Weekend</option>
                            <option value="Weekday">Weekday</option>
                        </select>
                    </div>

                    @if($errors->has('period'))
                     <div class="form-group has-feedback has-error">
                        <label class="control-label" for="fees"><i class="fa fa-times-circle-o"></i> {{ $errors->first('type') }}</label>
                        @else
                    <div class="form-group">
                        <label for="fees">Period</label>
                        @endif
                        <select name="period" class="form-control">
                            <option value="9:00 - 12:00 am">9:00 - 12:00 am</option>
                            <option value="1:00 - 4:00 pm">1:00 - 4:00 pm</option>
                            <option value="4:00 - 7:00 pm">4:00 - 7:00 pm</option>
                        </select>
                    </div>

                   {{--  </div>/.box-body --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('backend.batch.index') }}" class="btn btn-default">Cancel</a>
                    </div>
            </div>
        </form>
    </div>
   
@stop


@section("scripts")

<script>
"use strict";
let nowDate = new Date();
let today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
let enddate;

 $('#startdatepicker').datepicker({
      autoclose:true,
      todayHighlight: true,
      startDate:today,
      format: 'yyyy-mm-dd',
      datesDisabled: ['2017-03-21', '2017-04-20', '2016-04-13']
    }).on("changeDate",function(e){

    // let present=new Date(e.date);
    // enddate = new Date(present.getFullYear(), present.getMonth(), present.getDate(), 0, 0, 0, 0);
    var fromDate = $('#startdatepicker').val().split("/");
    let present=new Date(fromDate[2] , fromDate[1] - 1 , fromDate[0]);
    enddate = new Date(present.getFullYear(), present.getMonth(), present.getDate() + 1, 0, 0, 0, 0);

     $('#enddatepicker').datepicker('setStartDate', enddate );
        

    });


    $('#enddatepicker').datepicker({
         autoclose: true
    });

    
        


    // $('#enddatepicker').datepicker({
    //      autoclose: true,
    //      startDate: enddate
    // });

  // $('#enddatepicker').datepicker({
  //        autoclose: true,
  //        startDate: enddate

  //       }).on("changeDate",function(e){
  //          console.log(enddate);
  //       });
 
</script>
@stop


@section('breadcrumbs')
    {!! Breadcrumbs::render('blogs.create') !!}
@stop
