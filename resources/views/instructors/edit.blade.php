@extends('adminlte::page')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Instructor</h3>
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

    <div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Input Instructor Data</h3>
          </div>
         <form action="{{route('instructors.update', $instructor->id)}}" method="post">
            
            @csrf
            @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Instructor Full Name: </label>
                  <input type="text" class="form-control" id="full_name" placeholder="Enter Instructor Name" name="full_name" value="{{$instructor->full_name}}">
                </div>

                <div class="form-group">
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="male" {{($instructor->gender == 'male')? 'checked' : 'unchecked'}} value="male" >
                      Male
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="gender" id="female" value="female"  {{($instructor->gender == 'female')? 'checked' : 'unchecked'}}>
                      Female
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email: </label>
                  <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{$instructor->email}}">
                </div>
                <div class="form-group">
                  <label for="phone">Phone: </label>
                  <input type="phone" class="form-control" placeholder="Phone" id="phone" name="phone" value="{{$instructor->phone}}">
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
                  <input type="text" class="form-control" placeholder="Title" id="title" name="title" value="{{$instructor->title}}">
                </div>
                <div class="form-group">
                  <label for="qualification">Qualification: </label>
                  <input type="text" class="form-control" placeholder="Qualification" id="qualification" name="qualification" value="{{$instructor->qualification}}" >
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Department</label>
                  <select class="form-control"  id="exampleInputPassword1" name='department_id'>
                    <option value="{{$instructor->department->id}}">{{$instructor->department->department_code}}</option>
                    <?php 
                     use App\Department;
                     $departments= Department::all(); ?>
                    <option>Select one</option>
                    @foreach($departments as $department)
                     <option value="{{$department->id}}">{{$department->department_code}}</option>
                    @endforeach
                  </select>
                </div>

                <div class="box-footer">
                <a href="{{route('instructors.index')}}" class="btn btn-sm btn-success">Back</a>
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
              </div>
              <!-- /.box-body -->

        </form>
      </div>
    </div>
  </div>
@endsection