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
              <h3 class="box-title">Semester Registration</h3>
              <form action="{{ route('semester_registration.index') }}"  role="search">
            
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
                        <th>No.</th>
                        <th>Semester</th>
                        <th>Student</th>
                        <th>Student ID</th>
                        <th>Registration Date</th>
                        <th>Courses</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php $i =0;?>
              @if(isset($semesterRegistrations))
          
        <tbody>
            @foreach($semesterRegistrations as $semesterRegistration)
            <tr>
                <td><b>{{++$i}}.</b></td>
                <td>{{$semesterRegistration->semester->semester_name}} in {{$semesterRegistration->semester->academic_year}}</td>
                <td>{{$semesterRegistration->student->full_name}}</td>
                <td>{{$semesterRegistration->student->id_no}}</td>
                <td>{{$semesterRegistration->created_at}}</td>
                <td>{{count($semesterRegistration->courses()->get())}} out of {{count($semesterRegistration->courseOffering->courses()->get())}}</td>
                 <td>{{$semesterRegistration->status}}</td>
                <td>
                <form action="{{ route('semester_registration.destroy', $semesterRegistration->id) }}" method="post">
                  <a class="abel label-success" href="{{route('semester_registration.show',$semesterRegistration->id)}}"> <span class="glyphicon glyphicon-eye-open"></span><a>


                  <a class="abel label-warning" href="{{route('course_offerings.edit',$semesterRegistration->id)}}"><span class="glyphicon glyphicon-pencil"></span></a>
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
            {!! $semesterRegistrations->links() !!}
          </div>
            </div>
            <!-- /.box-body -->
          
        </div>
  </div>

@endsection