@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Course Offerings</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('course_offerings.create') }}">Create New Course</a>
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
			       <th >Batch</th>
			       <th>Department</th>
             <th>Semester</th>
             <th>No. Course</th>
             <th>Registration Due date</th>
             <th>Registration End date</th>
             <th>Semester End Date</th>
			       <th>Action</th>
     			</tr>
               
      			@foreach ($courseOfferings as $courseOffering)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$courseOffering->batch->name}}</td>
		          <td>{{$courseOffering->department->department_code}}</td>
              <td>{{$courseOffering->semester->semester_name}}</td>
              <td>{{count($courseOffering->courses()->get())}}</td>
              <td>{{$courseOffering->due_date}}</td>
              <td>{{$courseOffering->end_date}}</td>
              <td>{{$courseOffering->semester->end_date}}</td>
		          <td>
		            <form action="{{ route('course_offerings.destroy', $courseOffering->id) }}" method="post">
		              <a class="abel label-success" href="{{route('course_offerings.show',$courseOffering->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>


		              <a class="abel label-warning" href="{{route('course_offerings.edit',$courseOffering->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
              <div class="box-footer">
            {!! $courseOfferings->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection