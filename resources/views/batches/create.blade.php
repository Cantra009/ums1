@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Batch</h3>
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
              <h3 class="box-title">Input Batch Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('batches.store')}}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="campus_name">Batch Name</label>
                  <input type="text" class="form-control" id="batch_name" placeholder="Enter Batch Name" name="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Start Year</label>
                  <input type="number" class="form-control" placeholder="Start Year" id="exampleInputPassword1" name="start_year" ></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">End Year</label>
                  <input type="number" class="form-control" placeholder="End Year" id="exampleInputPassword1" name="end_year" ></textarea>
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