@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Semester</h3>
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
                  <h3 class="box-title">Input Semester Data</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{route('semesters.store')}}" method="post">
                @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="campus_name">Semester Name</label>
                      <input type="text" class="form-control" id="section_name" placeholder="Enter Section Name" name="semester_name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Academic Year</label>
                      <input type="text" class="form-control" name="academic_year"  placeholder="Enter Academic Year">
                    </div>
                    
                    <div class="form-group">
                      <label>Start Date</label>
                         <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                          <input type="date" class="form-control pull-right" id="datepicker" name="start_date">
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

                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                      <input type="text" class="form-control" name="description"  placeholder="Enter Description">
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

<script>
  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
  </script>