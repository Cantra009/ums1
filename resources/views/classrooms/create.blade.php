@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Room</h3>
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




<div class="col-md-7">
  <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Input Room Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form action="{{route('classrooms.store')}}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="campus_name">Room Label</label>
                  <input type="text" class="form-control" id="room_label" placeholder="Enter Room label" name="room_label">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Dimension</label>
                  <input type="text" class="form-control" placeholder="Dimensions : 12m x 10m" id="exampleInputPassword1" name="dimensions" >
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Campus</label>
                  <select class="form-control"  id="exampleInputPassword1" name='campus_id'>
                    
                    @foreach($campuses as $campus)
                     <option value="{{$campus->id}}">{{$campus->name}}</option>
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