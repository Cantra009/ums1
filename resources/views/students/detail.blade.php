@extends('adminlte::page')
@section('content')
<div class="container">
  
     <div class="row">

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @if($student->photo != null)<img src="{{ asset( 'public/storage/photos/' . $student->photo ) }}" width="50px" height="60px"> @endif
      <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Personal Details</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
          <div class="box-body">
            <table class="table table-striped">
            <tr><th>Student Full Name: </th><td> {{$student->full_name}}</td></tr>
            <tr><th>Student ID No: </th><td> {{$student->id_no}}</td></tr>
            <tr><th>Gender: </th><td> {{$student->gender}}</td></tr>
            <tr><th>Date of Birth: </th><td> {{$student->dob}}</td></tr>
            <tr><th>Phone: </th><td> {{$student->phone}}</td></tr>
            <tr><th>Parent Name: </th><td> {{$student->full_name}}</td></tr>
            <tr><th>Parent Phone: </th><td> {{$student->parent_phone}}</td></tr>
            
            </table>

          </div>
          <!-- /.box -->
          </div>
      </div>

      <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Academic Details</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
          <div class="box-body">
            <table class="table table-striped">
            <tr><th>Scholarship: </th><td> {{$student->scholarship}}</td></tr>
            <tr><th>Shift: </th><td> {{$student->shift}}</td></tr>
            <tr><th>Batch: </th><td> {{$student->batch->name}}</td></tr>
            <tr><th>Department: </th><td> {{$student->department->department_code}}</td></tr>
            <tr><th>Section: </th><td> {{$student->section->section_name}}</td></tr>
            <tr><th>Status: </th><td> @if($student->status == '1')Active @else Inactive @endif</td></tr>
            </table>

          </div>
          <!-- /.box -->
          </div>
      </div>
      <!-- /.col -->

      <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Actions</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
          <div class="box-body">
            <table class="table table-striped">
            <tr><th><form action="{{route('dismissed_students.create')}}">
              <input type="hidden" name="student_id" value="{{$student->id}}">
              <button type="submit" class="btn btn-default"><i class="fa fa-user-alt-slash"></i></button>
            </form>
              </th></tr>
            <tr><th>Withdraw / Readmit</th></tr>
            <tr><th>Print Registration Slip</th></tr>
            <tr><th>Print GPA Report</th></tr>
            <tr><th>Excempt Courses</th></tr>
            </table>

          </div>
          <!-- /.box -->
          </div>
      </div>
    </div>
  </div>
@endsection


