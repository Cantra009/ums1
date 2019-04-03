@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Batch</h3>
      </div>
    </div>
<div>
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
                  <h3 class="box-title">Input Section Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('sections.update', $section->id)}}" method="post">
                @csrf
                @method('PUT')
                  <div class="box-body">
                    <div class="form-group">
                      <label for="campus_name">Section Name</label>
                      <input type="text" class="form-control" id="section_name" placeholder="Enter Section Name" name="section_name" value="{{$section->section_name}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Shift</label>
                      <select class="form-control" name="shift">
                        <option value="{{$section->shift}}">{{$section->shift}}</option>
                        <option >Select Other</option>
                        <option value="morning">Morning</option>
                        <option value="afternoon">Afternoon</option>

                      </select> 
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Department</label>
                      <select class="form-control" name="department_id">
                        <option value="{{$section->department->id}}">{{$section->department->department_code}}</option>
                        <?php 
                        use App\Department;
                        $departments= Department::all(); ?>
                        <option>Select one</option>
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_code}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Batch</label>
                      <select class="form-control" name="batch_id">
                        <option value="{{$section->batch->id}}">{{$section->batch->name}}</option>
                        <?php 
                        use App\Batch;
                        $batches= Batch::all(); ?>
                        <option>Select one</option>
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}">{{$batch->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Classroom</label>
                      <select class="form-control" name="classroom_id">
                        <option value="{{$section->classroom['id']}}">{{$section->classroom['room_label']}}</option>
                        <?php 
                        use App\Classroom;
                        $classrooms= Classroom::all(); ?>
                        <option>Select one</option>
                        @foreach($classrooms as $classroom)
                        <option value="{{$classroom->id}}">{{$classroom->room_label}}</option>
                        @endforeach
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