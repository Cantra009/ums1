@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Course Offering Details</h3>
      </div>
      
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif

 <?php $i = 0; $sum = 0; ?>
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
                
                <th >Teacher Name</th>
                <th>Department</th>
                <th>Semester</th>
                <th>Batch</th>
                <th>Semester End Date</th>
                
              </tr>
                  
                
                <tr>
                  <td>{{$instructorLoad->instructor->full_name}}</td>
                  <td>{{$instructorLoad->instructor->department->department_code}}</td>
                  <td>{{$instructorLoad->semester->semester_name}}</td>
                  <td>{{$instructorLoad->semester->batch->name}}</td>
                  <td>{{$instructorLoad->semester->end_date}}</td>
                  <td>
                    
                  </td>
                </tr>
            
                  </tbody></table>
                  
                </div>
                <!-- /.box-body -->
            </div>
            </div>
            </div>

            <div class="col-md-6">
              
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Offered Courses</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
             <th >No.</th>
             <th >Course Title</th>
             <th>Course Code</th>
             <th>Credit Hours</th>
             <th>Prerequisite</th>
             <th>Type</th>
          </tr>
             
              
            @foreach ($instructorLoad->courses as $course)
            <tr>
              <td><b>{{++$i}}.</b></td>
              <td>{{$course['course_name']}}</td>
              <td>{{$course['course_code']}}</td>
              <td>{{$course['credit_hours']}}</td>
              <td>
                @if($course['prerequisite_id'])
                  {{$course['prerequisite']['course_name']}}
                @else
                  -
                @endif
             </td>
              <td>
                @if($course['department_id'] === 0)
                 Common
                @else
                  Major
                @endif
              </td>
            </tr>
            <?php $sum = $sum + $course['credit_hours'];?>
            @endforeach
            <tr >
              <th colspan="3">
              Total Credit Hours:
              </th>
              <th>
                {{$sum}}
              </th>

            </tr>
              </tbody></table>
              
            </div>
            <!-- /.box-body -->
          
        </div>
</div>
</div>
@endsection