@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Batch Details </h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <strong>Room Label: </strong> {{$classroom->room_label}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Dimensions: </strong> {{$classroom->dimensions}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Campus: </strong> {{$classroom->campus->name}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('campuses.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection