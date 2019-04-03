@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Instructor</h3>
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
              <h3 class="box-title">Input Instructor Data</h3>
            </div>
            <!-- /.box-header -->
             
            <!-- form start -->
            <form action="{{route('instructors.store')}}" method="post">
            @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Instructor Full Name: </label>
                  <input type="text" class="form-control" id="full_name" placeholder="Enter Instructor Name" name="full_name">
                </div>

                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" value="male" checked="">
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="female" value="female">
                      Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email: </label>
                  <input type="email" class="form-control" placeholder="Email" id="email" name="email" >
                </div>
                <div class="form-group">
                  <label for="phone">Phone: </label>
                  <input type="phone" class="form-control" placeholder="Phone" id="phone" name="phone" >
                </div>
                <div class="form-group">
                  <label for="email">Employement Type: </label>
                  <select class="form-control" id="email" name="type"> 
                    <option value="fulltime">Fulltime</option>
                    <option value="parttime">Parttime</option>
                  </select> 
                </div>
                <div class="form-group">
                  <label for="qualification">Title: </label>
                  <input type="text" class="form-control" placeholder="Title" id="title" name="title" >
                </div>
                <div class="form-group">
                  <label for="qualification">Qualification: </label>
                  <input type="text" class="form-control" placeholder="Qualification" id="qualification" name="qualification" >
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Department</label>
                  <select class="form-control"  id="exampleInputPassword1" name='department_id'>
                    <option>Select one</option>
                    @foreach($departments as $department)
                     <option value="{{$department->id}}">{{$department->department_code}}</option>
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