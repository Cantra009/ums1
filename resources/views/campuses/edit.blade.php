@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Campus</h3>
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

    <form action="{{route('campuses.update',$campus->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6">
          <strong>Campus Name :</strong>
          <input type="text" name="name" class="form-control" value="{{$campus->name}}">
        </div>
        <div class="col-md-6">
          <strong>Address:</strong>
          <textarea class="form-control" name="address" rows="2" >{{$campus->address}}</textarea>
        </div>

        <div class="col-md-6">
          <a href="{{route('campuses.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
@endsection