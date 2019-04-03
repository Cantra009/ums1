@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Courses</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('courses.create') }}">Create New Course</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif



		<div class="col-xs-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Course List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
			       <th >No.</th>
			       <th >Course Title</th>
			       <th>Course Code</th>
             <th>Credit Hours</th>
             <th>Course Fee</th>
             <th>Prerequisite</th>
             <th>Department</th>
			       <th>Action</th>
     			</tr>
               
      			@foreach ($courses as $course)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$course->course_name}}</td>
		          <td>{{$course->course_code}}</td>
              <td>{{$course->credit_hours}}</td>
              <td>{{$course->course_fee}}</td>
              <td>{{$course->prerequisite['course_code']}}</td>
              <td>{{$course->department->department_code}}</td>
		          <td>
		            <form action="{{ route('courses.destroy', $course->id) }}" method="post">
		              <a class="abel label-success" href="{{route('courses.show',$course->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>


		              <a class="abel label-warning" href="{{route('courses.edit',$course->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
              <div class="box-footer">
            {!! $courses->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection