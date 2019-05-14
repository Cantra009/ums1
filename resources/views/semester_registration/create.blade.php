@extends('adminlte::page')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-7">
        
      </div>
      <div class="col-sm-2">
        
      </div>
    </div>

    @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{$message}}</p>
      </div>
    @endif




      <div class="col-md-6">
        <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Student Semester Registration</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form action="{{route('semester_registration.store')}}" method="post" name="register">
                  @csrf
                    <div class="box-body">
                      <input type="hidden" name="student_id" value="{{$student->id}}">
                      <input type="hidden" name="course_offering_id" value="{{$courseOffering->id}}">
                      <div class="form-group">
                        <label for="campus_name">Student Name: </label>
                        <input type="text" class="form-control" id="batch_name" placeholder="Enter Batch Name" name="full_name" value="{{$student->full_name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">ID No. </label>
                        <input type="text" class="form-control" placeholder="Enter Level" id="exampleInputPassword1" name="id_no" value="{{$student->id_no}}" >

                      </div>
                      <div class="form-group">
                      <label for="exampleInputPassword1">Semester: </label>
                      <input type="hidden" class="form-control" name="semester_id" value="{{$semester->id}}">
                        <b>{{$semester->semester_name}} in {{$semester->academic_year}} for {{$semester->batch->name}}</b>
                       @if($courseOffering->due_date < date('Y-m-d')) <p class="alert-danger">Your Registration is late penalty may apply</p>
                       <input type="hidden" name="status" value="late">
                       @endif
                       
                    </div>
                    <table class="table table-hover" id="registration">
                      <thead>
                    <tr>
                        <th>No. </th>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Credit Hours</th>
                        <th>Action</th>
                    </tr>
                </thead>
                   <?php $i =0;?>
                @if(isset($courseOffering))
                <?php $course1 ='';
                      $fee =0.0; 
                ?>
                <tbody>
               @foreach ($courseOffering->courses as $course)
                <tr>
                  <td><b>{{++$i}}.</b></td>
                     <div id="{{$i}}"><td>{{$course->course_name}}</td>
                      <td>{{$course->course_code}}</td>
                      <td>{{$course->credit_hours}}</td>
                      <input type="hidden" name="courses" value="{{$course1 .=$course->id.','}}">
                       <input type="hidden" name="fee" value="{{$fee +=$course->course_fee}}">
                       
                      <td>
                      <a onclick="drop(this, {{$course->course_fee}}, {{$course->id}})"> Drop</a>
                      </td>
                      </div>
                  </tr>
                @endforeach
                @endif
                  </tbody>
              </table>
                    </div>
                    <!-- /.box-body -->
                    <input type="hidden" name="droped_course_fee" id="droped_course_fee">
                    <input type="hidden" name="droped_courses_id" id="dropedIcoursesId">
                    <div class="box-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
                <!-- /.box -->
            </div>
          </div>
<script>
function drop( r, fee, id) {
  var new_ids;
  var i = r.parentNode.parentNode.rowIndex;
  var d_text = document.getElementById("droped_course_fee");
  var d_value = d_text.value;
  if(d_value=='')
    d_value = 0;
   var new_fee = parseFloat(fee) +parseFloat(d_value);
  console.log('old fee' + d_value);
  console.log("new fee"+ new_fee);
   d_text.value = new_fee;

   var d_Id_text = document.getElementById("dropedIcoursesId");
  var old_Id_value = d_Id_text.value;
  if(old_Id_value==''){
      new_ids = id;
    d_Id_text.value = new_ids;
  }
  else{
    var new_ids= old_Id_value + ',' + id
    d_Id_text.value = new_ids;
  }
  console.log('old fee' + old_Id_value);
  console.log("new id"+ new_ids);
  document.getElementById("registration").deleteRow(i);
  

}
</script>
@endsection