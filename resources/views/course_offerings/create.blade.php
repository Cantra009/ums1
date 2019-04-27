@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Course Offering</h3>
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
    



<div class="col-md-7">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Select semester and department</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('course_offerings.store')}}" method="post">
            @csrf
              <div class="box-body">
                <input type="hidden" name="status" value="selection" />
                <div class="form-group">
                      <label for="exampleInputPassword1">Batch</label>
                      <select class="form-control" name="batch_id">
                        
                        @foreach($batches as $batch)
                        <option value="{{$batch->id}}">{{$batch->name}}</option>
                        @endforeach
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
                      <label for="exampleInputPassword1">Semester</label>
                      <select class="form-control" name="semester_id">
                        
                        @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->semester_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Due Date</label>
                         <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input type="date" class="form-control pull-right" id="datepicker" name="due_date">
                        </div>
                      <!-- /.input group -->
                    </div>

                    <div class="form-group">
                      <label>End Date</label>
                         <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input type="date" class="form-control pull-right" id="datepicker2" name="end_date">
                        </div>
                      <!-- /.input group -->
                    </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">OK</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
      
    </div>
    </div>
@endsection