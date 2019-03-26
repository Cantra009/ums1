@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Campuses</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-success" href="{{ route('campuses.create') }}">Create New Campus</a>
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
              <h3 class="box-title">Campus List</h3>

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
			       <th>Adddress</th>
			       <th>Action</th>
     			</tr>
                
      			@foreach ($campuses as $campus)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$campus->name}}</td>
		          <td>{{$campus->address}}</td>
		          <td>
		            <form action="{{ route('campuses.destroy', $campus->id) }}" method="post">
		              <a class="abel label-success" href="{{route('campuses.show',$campus->id)}}"><span class="glyphicon glyphicon-eye-open"></span><a>
		              <a class="abel label-warning" href="{{route('campuses.edit',$campus->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
          
        </div>
{!! $campuses->links() !!}
  </div>

@endsection