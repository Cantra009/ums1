@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Course Offerings</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('instructor_loads.create') }}">Create New Course</a>
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
              <h3 class="box-title">Course Offering List</h3>

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
			       <th >Instructor</th>
             <th>Semester</th>
             <th>Batch</th>
             <th>No. Sections</th>
             <th>No. Courses</th>
             <th>Total Credit Hours</th>
             
			       <th>Action</th>
     			</tr>
               
      			@foreach ($instructorLoads as $instructorLoad)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$instructorLoad->instructor->full_name}}</td>
		          <td>{{$instructorLoad->semester->semester_name}} in {{$instructorLoad->semester->academic_year}}</td>
              <td>{{$instructorLoad->sections[0]->batch->name}}</td>
              <td>{{count($instructorLoad->sections()->get())}}</td>
              <td>{{count($instructorLoad->courses()->get())}}</td>
              <td>{{$instructorLoad->courses()->sum('credit_hours')}}</td>
              
		          <td>
		            <form action="{{ route('instructor_loads.destroy', $instructorLoad->id) }}" method="post">
		              <a class="abel label-success" href="{{route('instructor_loads.show',$instructorLoad->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>
          

		              <a class="abel label-warning" href="{{route('instructor_loads.edit',$instructorLoad->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
              <div class="box-footer">
            {!! $instructorLoads->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection