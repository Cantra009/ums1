@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Classrooms</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('classrooms.create') }}">Create New Classroom</a>
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
              <h3 class="box-title">Rooms List</h3>

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
			       <th >Room Label</th>
             <th >Dimensions</th>
			       <th>Campus</th>
             <th>No. Sections</th>
			       <th>Action</th>
     			</tr>
                
      			@foreach ($classrooms as $classroom)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$classroom->room_label}}</td>
		          <td>{{$classroom->dimensions}}</td>
              <td>{{$classroom->campus->name}}</td>
              <td>{{count($classroom->sections()->get())}}</td>
		          <td>
		            <form action="{{ route('classrooms.destroy', $classroom->id) }}" method="post">
		              <a class="abel label-success" href="{{route('classrooms.show',$classroom->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>


		              <a class="abel label-warning" href="{{route('classrooms.edit',$classroom->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
              <div class="box-footer">
            {!! $classrooms->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection