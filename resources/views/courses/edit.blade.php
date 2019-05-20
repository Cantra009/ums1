@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-10">
        <h3>Edit Course</h3>
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
          <h3 class="box-title">Input Course Data</h3>
          </div>
       <form action="{{route('courses.update',$course->id)}}" method="post">
      @csrf
      @method('PUT')
      
             <div class="box-body">
                <div class="form-group">
                  <label for="course_name">Course Name</label>
                  <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name" name="course_name" value="{{$course->course_name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Course Code</label>
                  <input type="text" class="form-control" placeholder="Course Code" id="exampleInputPassword1" name="course_code" value="{{$course->course_code}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Credit Hours</label>
                  <input type="number" class="form-control" placeholder="Credit Hours" id="exampleInputPassword1" name="credit_hours" value="{{$course->credit_hours}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Course Fee</label>
                  <input type="number" class="form-control" placeholder="Fee" id="exampleInputPassword1" name="course_fee" value="{{$course->course_fee}}">
                </div>
                <div class="form-group">
                      <label for="exampleInputPassword1">Prerequisite</label>
                      <select class="form-control" name="prerequisite_id">
                      <option value="{{$course->prerequisite['id']}}">{{$course->prerequisite['course_name']}}</option>
                      <option value="null">Select</option>
                          <?php 
                          use App\Course;
                          $courses= Course::all(); ?>
                       
                        @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                  <label for="exampleInputPassword1">Department</label>
                  <select class="form-control"  id="exampleInputPassword1" name='department_id'>
                    <?php 
                     use App\Department;
                     $departments= Department::all(); ?>
                    <option>Select one</option>
                    @foreach($departments as $department)
                     <option value="{{$department->id}}" {{($course->department_id==$departments->id)?'selected':''}}>{{$department->department_code}}</option>
                    @endforeach
                  </select>
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
    </form>
  </div>
</div>
  </div>
@endsection