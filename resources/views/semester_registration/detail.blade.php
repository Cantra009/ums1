@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Teacher Courses  Details</h3>

            </div>
            <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                
                <th>Student Name</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Batch</th>
                <th>Semester End Date</th>
                
              </tr>
                  
                
                <tr>
                  <td>{{$semesterRegistration->student->full_name}}</td>
                  <td>{{$semesterRegistration->student->department->department_code}}</td>
                  <td>{{$semesterRegistration->semester->semester_name}}</td>
                </tr>
            
                  </tbody></table>
                  
                </div>
                <!-- /.box-body -->
            </div>
            </div>
            </div>
  </div>
@endsection