@extends('adminlte::page')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-7">
        <h3>Departments</h3>
      </div>
      <div class="col-sm-2">
        <a class="btn btn-sm btn-info" href="{{ route('students.index') }}">Submit New</a>
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
              <h3 class="box-title">Dismissed Students List</h3>
              <form action="{{ route('dismissed_students.index') }}"  role="search">
            
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" id="search" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </form>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <div class="container">
                  
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name </th>
                        <th>ID</th>
                        <th>Reason for dismissal</th>
                        <th># Completed Semsters</th>
                        <th>Action</th>
                    </tr>
                </thead>
              @if(isset($dissmissedStudents))
          
        <tbody>
            @foreach($dissmissedStudents as $student)
            <tr>
                <td>{{$student->student->full_name}}</td>
                <td>{{$student->student->id_no}}</td>
                <td>{{$student->reason}}</td>
                <td>{{$student->number_of_semester_completed}}</td>
                 
                <td>
                <form action="{{ route('dismissed_students.destroy', $student->id) }}" method="post">
                  <a class="abel label-success" href="{{route('dismissed_students.show',$student->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>


                  <a class="abel label-warning" href="{{route('course_offerings.edit',$student->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="label label-danger"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
              </tbody></table>
              <div class="box-footer">
            {!! $dissmissedStudents->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection