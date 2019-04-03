@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Instructors</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('instructors.create') }}">Create New Instructor</a>
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
              <h3 class="box-title">Instructors List</h3>

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
			       <td>Name</td>
             <td>Email</td>
             <td>Gender</td>
             <td>Emp. Type</td>
             <td>Phone</td>
             <td>Title</td>
             <td>Qualification</td>
             <td>Department</td>
			       <th>Action</th>
     			</tr>
 

      			@foreach ($instructors as $instructor)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$instructor->full_name}}</td>
		          <td>{{$instructor->email}}</td>
              <td>{{$instructor->gender}}</td>
              <td>{{$instructor->type}}</td>
              <td>{{$instructor->phone}}</td>
              <td>{{$instructor->title}}</td>
              <td>{{$instructor->qualification}}</td>
              <td>{{$instructor->department->department_code}}</td>
		          <td>
		            <form action="{{ route('instructors.destroy', $instructor->id) }}" method="post">
		              <a class="abel label-success" href="{{route('instructors.show',$instructor->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>

                   
		              <a class="abel label-warning" href="{{route('instructors.edit',$instructor->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
              <div class="box-footer">
            {!! $instructors->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection