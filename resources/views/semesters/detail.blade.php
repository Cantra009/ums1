@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h3>Semester Details </h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <strong>Semester: </strong> {{$semester->semester_name}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Academic Year: </strong> {{$semester->academic_year}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>Start Year: </strong> {{$semester->start_date}}
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <strong>End Year: </strong> {{$semester->end_date}}
        </div>
      </div>
      <div class="col-md-12">
        <a href="{{route('semesters.index')}}" class="btn btn-sm btn-success">Back</a>
      </div>
    </div>
  </div>
@endsection