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

    <form action="{{route('batches.update',$batch->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-7">
        <div class="box-body">
                <div class="form-group">
                  <label for="campus_name">Batch Name</label>
                  <input type="text" class="form-control" id="batch_name" placeholder="Enter Batch Name" name="name" value="{{$batch->name}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Start Year</label>
                  <input type="number" class="form-control" placeholder="Start Year" id="exampleInputPassword1" name="start_year"  value="{{$batch->start_year}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">End Year</label>
                  <input type="number" class="form-control" placeholder="End Year" id="exampleInputPassword1" name="end_year" value="{{$batch->end_year}}">
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