@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Student</h3>
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


<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Student Data</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
            
              <div class="box-body">
        <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="col-md-4">
  
                <div class="form-group">
                  <label for="name">Student Full Name: </label>
                  <input type="text" class="form-control" id="full_name" placeholder="Enter Instructor Name" name="full_name">

                  <label for="name">ID No: </label>
                  <input type="text" class="form-control" id="full_name" placeholder="Enter Instructor Name" name="id_no">
          
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="male" checked="">
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="female" value="female">
                      Female
                    </label>
                  </div>
                </div>
                <!-- Date -->
              <div class="form-group">
                <label>Date of Birth:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control pull-right" id="datepicker" name="dob">
                </div>
                
              </div>
                <div class="form-group">
                  <label for="email">Parent Name: </label>
                  <input type="name" class="form-control" placeholder="Email" id="email" name="parent_name" >
                </div>
                <div class="form-group">
                  <label for="phone">Parent Phone: </label>
                  <input type="phone" class="form-control" placeholder="Phone" id="phone" name="parent_phone" >
                </div>
               
              </div>
              <!-- /.col-md -->
          
              <div class="col-md-4">
                <div class="form-group">
                  <label for="phot">Student Photo: </label>
                  <input type="file" class="form-control" id="photo" name="photo" >
                  
                </div>
                <div class="radio">
                    <label>
                      <input type="radio" name="scholarship" id="scholarship" value="yes">
                      Scholarship
                    </label>
                  </div>
                 
                <div class="form-group">
                  <label for="exampleInputPassword1">Department</label>
                  <select class="form-control"  id="exampleInputPassword1" name='department_id'>
                    <option>Select one</option>
                    <?php 
                      use App\Department;
                      $departments = Department::all();
                    ?>
                    @foreach($departments as $department)
                     <option value="{{$department->id}}">{{$department->department_code}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Batch</label>
                  <select class="form-control"  id="exampleInputPassword1" name='batch_id'>
                    <option>Select one</option>
                    <?php 
                      use App\Batch;
                      $batches = Batch::all();
                    ?>
                    @foreach($batches as $batch)
                     <option value="{{$batch->id}}">{{$batch->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="email">Shift: </label>
                  <select class="form-control" id="email" name="shift"> 
                    <option value="Morning">Morning</option>
                    <option value="Afternoon">Afternoon</option>
                  </select> 
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Section</label>
                  <select class="form-control"  id="exampleInputPassword1" name='section_id'>
                    <option>Select one</option>
                    <?php 
                      use App\Section;
                      $sections = Section::all();
                    ?>
                    @foreach($sections as $section)
                     <option value="{{$section->id}}">{{$section->section_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </div>

              
            </form>
          </div>
          <!-- /.box -->
      </div>
    </div>
@endsection