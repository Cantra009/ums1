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

    <form action="{{route('departments.update',$department->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-7">
        <div class="box-body">
                <div class="form-group">
                  <label for="campus_name">Department Name</label>
                  <input type="text" class="form-control" id="batch_name" placeholder="Enter Department Name" name="department_name" value="{{$department->department_name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Department Code</label>
                  <input type="text" class="form-control" placeholder="Department Code" id="exampleInputPassword1" name="department_code"  value="{{$department->department_code}}">
                </div>
                
                 <div class="form-group">
                  <label for="exampleInputPassword1">Faculty</label>
                  <select class="form-control"  id="exampleInputPassword1" name='faculty_id'>
                    <option value="{{$department->faculty->id}}">{{$department->faculty->name}}</option>
                     <?php 
                     use App\Faculty;
                     $faculties= Faculty::all(); ?>
                    @foreach($faculties as $faculty)
                     <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
                <div class="box-footer">
                <a href="{{route('batches.index')}}" class="btn btn-sm btn-success">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
              </div>
              <!-- /.box-body -->

        
      </div>
    </form>
  </div>
@endsection