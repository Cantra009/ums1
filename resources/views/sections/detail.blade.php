@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Section Details </h3>
        <hr>
      </div>
    </div>
    <?php $i = 0; $sum = 0; ?>
    
    <div class="row">
      <div class="col-md-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Course Offering Details</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <th >Section Name</th>
                  <th >Shift</th>
                  <th >Class Room</th>
                  <th >Department</th>
                  <th >Batch</th>
               </tr>
              <tr>
                <td>{{$section->section_name}}</td>
                <td>{{$section->shift}}</td>
                <td>{{$section->classroom->room_label}}</td>
                <td>{{$section->department->department_code}}</td>
                <td>{{$section->batch->name}}</td>
               
              </tr>
         
              </tbody></table>
              
            </div>
            <!-- /.box-body -->


      <div class="col-md-12">
        <div class="form-group">
        
      <div class="box">
            <div class="box-header">
              <h3 class="box-title">Students</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
             <th >No.</th>
             <th >Student ID</th>
             <th >Student Name</th>
             <th>Geneder</th>
             <th>Phone</th>
          </tr>
             
              
            @foreach ($section->students as $student)
            <tr>
              <td><b>{{++$i}}.</b></td>
              <td>{{$student['id_no']}}</td>
              <td>{{$student['full_name']}}</td>
              <td>{{$student['gender']}}</td>
              <td>{{$student['phone']}}</td>
              
              
            </tr>
          
            @endforeach
              </tbody></table>
              
            </div>
            <!-- /.box-body -->
          
        </div>
      
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('sections.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection