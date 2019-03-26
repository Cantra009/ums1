@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Batch</h3>
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

    <form action="{{route('faculties.update',$faculty->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-7">
        <div class="box-body">
                <div class="form-group">
                  <label for="campus_name">Faculty Name</label>
                  <input type="text" class="form-control" id="faculty_name" placeholder="Enter Faculty Name" name="name" value="{{$faculty->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Level</label>
                  <input type="text" class="form-control" placeholder="Level" id="exampleInputPassword1" name="level"  value="{{$faculty->level}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <input type="text" class="form-control" placeholder="Description" id="exampleInputPassword1" name="description" value="{{$faculty->description}}">
                </div>
                <div class="box-footer">
                <a href="{{route('faculties.index')}}" class="btn btn-sm btn-success">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
              </div>
              <!-- /.box-body -->

        
      </div>
    </form>
  </div>
@endsection