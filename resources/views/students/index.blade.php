@extends('adminlte::page')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Students</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('students.create') }}">Create New Student</a>
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif



		<div class="col-xs-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Student List</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
			       <th >No.</th>
			       <td>Name</td>
             <td>ID No</td>
             <td>DOB</td>
             <td>Gender</td>
             <td>Phone</td>
             <td>Department</td>
             <td>Batch</td>
             <td>Shift</td>
             <td>Section</td>
             <td>Status</td>
             <td>Photo</td>
			       <th>Action</th>
     			</tr>
 

      			@foreach ($students as $student)
        		<tr>
		          <td><b>{{++$i}}.</b></td>
		          <td>{{$student->full_name}}</td>
		          <td>{{$student->id_no}}</td>
              <td>{{$student->dob}}</td>
              <td>{{$student->gender}}</td>
              <td>{{$student->phone}}</td>
              <td>{{$student->department['department_code']}}</td>
              <td>{{$student->batch['name']}}</td>
              <td>{{$student->shift}}</td>
              <td>{{$student->section['section_name']}}</td>
              <td>{{$student->status}}</td>
              <td>@if($student->photo != null)<img src="{{ asset( 'public/storage/photos/' . $student->photo ) }}" width="50px" height="60px"> @endif</td>
		          <td>
		            <form action="{{ route('students.destroy', $student->id) }}" method="post">
		              <a class="abel label-success" href="{{route('students.show',$student->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>

                   
		              <a class="abel label-warning" href="{{route('students.edit',$student->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
		              @csrf
		              @method('DELETE')
		              <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
		            </form>
		          </td>
        		</tr>
     		 @endforeach
              </tbody></table>
              <div class="box-footer">
            {!! $students->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection