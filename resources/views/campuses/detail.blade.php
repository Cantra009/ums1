@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Campus Details </h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <strong>Campus Name: </strong> {{$campus->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Campus Address: </strong> {{$campus->address}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('campuses.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection