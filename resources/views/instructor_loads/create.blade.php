@extends('adminlte::page')

@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Instructor Load Setup</h3>
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
              <h3 class="box-title">Select semester and section sssign instructors</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('instructor_loads.store')}}" method="post">
            @csrf
              <div class="box-body">
                <input type="hidden" name="status" value="selection" />
                <div class="form-group">
                      <label for="exampleInputPassword1">Semester</label>
                      <select class="form-control" name="semester_id">
                        
                        @foreach($semesters as $semester)
                        <option value="{{$semester->id}}">{{$semester->semester_name}} in {{$semester->academic_year}}</option>
                        @endforeach
                      </select>
                    </div>
                <div class="form-group">
                      <label for="exampleInputPassword1">section</label>
                      <select class="form-control" name="instructor_id">
                        
                        @foreach($instructors as $instructor)
                        <option value="{{$instructor->id}}">{{$instructor->full_name}}</option>
                        @endforeach
                      </select>
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