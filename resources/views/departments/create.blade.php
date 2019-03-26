@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Department</h3>
      </div>
    </div>

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
              <h3 class="box-title">Input Department Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('departments.store')}}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="department_name">Department Name: </label>
                  <input type="text" class="form-control" id="batch_name" placeholder="Enter Department Name" name="department_name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Department Code: </label>
                  <input type="text" class="form-control" placeholder="Department Code" id="exampleInputPassword1" name="department_code" >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Faculty</label>
                  <select class="form-control"  id="exampleInputPassword1" name='faculty_id'>
                    <option>Select one</option>
                    @foreach($faculties as $faculty)
                     <option value="{{$faculty->id}}">{{$faculty->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </div>
@endsection