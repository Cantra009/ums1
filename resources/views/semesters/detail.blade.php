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
          <strong>Batch Name: </strong> {{$batch->name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Start Year: </strong> {{$batch->start_year}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>End Year: </strong> {{$batch->end_year}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('campuses.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection