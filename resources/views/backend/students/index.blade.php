@extends('backend.layout.master')

@section('content')
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <h3 class="box-title">Students Table</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th rowspan="1" colspan="1">ID</th>
                                                <th rowspan="1" colspan="1">Name</th>
                                                <th rowspan="1" colspan="1">Phone Number</th>
                                                <th rowspan="1" colspan="1">Email</th>
                                                <th rowspan="1" colspan="1">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $student)
                                                <tr>
                                                    <td>{{  $student->id }}</td>
                                                    <td>{{  $student->name }}</td>
                                                    <td>{{  $student->phone }}</td>
                                                    <td>{{  $student->email }}</td>
                                                    <td>
                                                        <form action="/backend/student/{{ $student->id }}" method="POST">
                                                            <a class="btn btn-info" href="{{ route('backend.student.show', $student->id ) }}">
                                                                <i class="fa fa-btn fa-info-circle"></i>
                                                            </a>
                                                            <a class="btn btn-success" href="{{ route('backend.student.edit', $student->id) }}">
                                                                <i class="fa fa-btn fa-edit"></i>
                                                            </a>

                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <!-- Large modal -->
                                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-confirm">
                                                                <i class="fa fa-btn fa-trash-o"></i>
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade modal-danger" id="delete-confirm" tabindex="-1" role="dialog" aria-labelledby="delete-confirm">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h4 class="modal-title" id="delete-confirm">Delete Confirmation</h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Are you sure? Do you want to <strong>DELETE!!!</strong>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger btn-outline pull-left" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger btn-outline"><i class="fa fa-btn fa-trash-o"></i> Delete</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        {!! $students->render() !!}
                                    </div>
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
@stop

@section('breadcrumbs')
    {!! Breadcrumbs::render('students') !!}
@stop
