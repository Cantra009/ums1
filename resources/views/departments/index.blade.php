@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Departments</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('departments.create') }}">Create New Department</a>
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
              <h3 class="box-title">Department List</h3>

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
			       <th >Name</th>
			       <th>Department Code</th>
             <th>Faculty</th>
			       <th>Action</th>
     			</tr>
                
      			@foreach ($departments as $department)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$department->department_name}}</td>
		          <td>{{$department->department_code}}</td>
              <td>{{$department->faculty->name}}</td>
		          <td>
		            <form action="{{ route('departments.destroy', $department->id) }}" method="post">
		              <a class="abel label-success" href="{{route('departments.show',$department->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>

                   
		              <a class="abel label-warning" href="{{route('departments.edit',$department->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
              <div class="box-footer">
            {!! $departments->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection