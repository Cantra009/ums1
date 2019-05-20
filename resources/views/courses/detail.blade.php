@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Course Details</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
          <div class="box-body">
            <table class="table table-striped">
            <tr><th>Course Name: </th><td> {{$course->course_name}}</td></tr>
            <tr><th>Course Code: </th><td> {{$course->course_code}}</td></tr>
            <tr><th>Credit Hours: </th><td> {{$course->credit_hours}}</td></tr>
            <tr><th>Course Fee: </th><td> {{$course->course_fee}}</td></tr>
            <tr><th>Prerequist: </th><td>{{($course->prerequisite_id== '')? 'Common' : $course->prerequisite->course_code}} </td></tr>
            <tr><th>Department: </th><td>{{($course->department_id== '')? '' : $course->department->department_code}} </td></tr>

            </table>

          </div>
          <!-- /.box -->
          </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('courses.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection