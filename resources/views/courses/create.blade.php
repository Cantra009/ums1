@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Course</h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif




<div class="col-md-6">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Course Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('courses.store')}}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="course_name">Course Name</label>
                  <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name" name="course_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Course Code</label>
                  <input type="text" class="form-control" placeholder="Course Code" id="exampleInputPassword1" name="course_code" >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Credit Hours</label>
                  <input type="number" class="form-control" placeholder="Credit Hours" id="exampleInputPassword1" name="credit_hours" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Course Fee</label>
                  <input type="decimal" class="form-control" placeholder="Fee" id="exampleInputPassword1" name="course_fee" >
                </div>
                <div class="form-group">
                      <label for="exampleInputPassword1">Prerequisite</label>
                      <select class="form-control" name="prerequisite_id">
                     
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                        @endforeach
                        <option value="0">None</option>
                      </select>
                    </div>
                    <div class="radio">
                    <label>
                      <input type="radio" name="major" id="major" value="1">
                      Major
                    </label>
                  </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Department</label>
                      <select class="form-control" name="department_id">
                        
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_code}}</option>
                        @endforeach
                        <option value="0">Common</option>
                      </select>
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