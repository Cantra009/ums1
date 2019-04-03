@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Section</h3>
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
                  <h3 class="box-title">Input Section Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('sections.store')}}" method="post">
                @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="campus_name">Section Name</label>
                      <input type="text" class="form-control" id="section_name" placeholder="Enter Section Name" name="section_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">shift</label>
                      <select class="form-control" name="shift">
                        <option value="morning">Morning</option>
                        <option value="afternoon">Afternoon</option>

                      </select> 
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Department</label>
                      <select class="form-control" name="department_id">
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_code}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Batch</label>
                      <select class="form-control" name="batch_id">
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}">{{$batch->name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Classroom</label>
                      <select class="form-control" name="classroom_id">
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