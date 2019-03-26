@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Campus</h3>
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
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('campuses.store')}}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="campus_name">Campus Name</label>
                  <input type="text" class="form-control" id="campus_name" placeholder="Enter Campus Name" name="name">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <textarea class="form-control" placeholder="Address" id="exampleInputPassword1" name="address" rows="2"></textarea>
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