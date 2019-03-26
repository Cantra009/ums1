@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Faculty</h3>
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
              <h3 class="box-title">Input Faculty Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('faculties.store')}}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="campus_name">Faculty Name: </label>
                  <input type="text" class="form-control" id="batch_name" placeholder="Enter Batch Name" name="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Level: </label>
                  <input type="text" class="form-control" placeholder="Enter Level" id="exampleInputPassword1" name="level" >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Description: </label>
                  <input type="text" class="form-control" placeholder="Enter Description" id="exampleInputPassword1" name="description" ></textarea>
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