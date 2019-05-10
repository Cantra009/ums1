@extends('adminlte::page')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Dismiss Student</h3>
      </div>
      <div class="col-sm-2">
        
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif




      <div class="col-md-6">
        <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form action="{{route('dismissed_students.store')}}" method="post">
                  @csrf
                    <div class="box-body">
                      <input type="hidden" name="student_id" value="{{$student->id}}">
                      <div class="form-group">
                        <label for="campus_name">Student Name: </label>
                        <input type="text" class="form-control" id="batch_name" placeholder="Enter Batch Name" name="full_name" value="{{$student->full_name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">ID No. </label>
                        <input type="text" class="form-control" placeholder="Enter Level" id="exampleInputPassword1" name="id_no" value="{{$student->id_no}}" >
                      </div>
                      
                      <div class="form-group">
                        <label for="exampleInputPassword1">Reason for dismissal: </label>
                        <input type="text" class="form-control" placeholder="Enter Description" id="exampleInputPassword1" name="reason" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Number of semesters: </label>
                        <input type="text" class="form-control" placeholder="Enter Description" id="exampleInputPassword1" name="number_of_semester_completed">
                      </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.box -->
            </div>
          </div>

@endsection