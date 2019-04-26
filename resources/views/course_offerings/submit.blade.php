@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>New Course Offering</h3>
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
    




      
      <form action="{{route('course_offerings.store')}}" method="post">
      @csrf
      
        <div class="col-md-3">
          <div class="box-header with-border">
              <h3 class="box-title">Shift courses to right panel</h3>
          </div>
          <input type="hidden" name="batch_id" value="" />
          <input type="hidden" name="semester_id" value="" />
          <input type="hidden" name="department_id" value="" />
          <input type="hidden" name="due_date" value="" />
          <input type="hidden" name="end_date" value="" />
          <div class="form-group">
            <input type="text"  class="form-control input-sm" placeholder="Search course here" id="coursesrc" name="coursesrc">
            <select class="form-control input-sm" id="courses" name="courses" multiple style="height:380px">
              
                @foreach($courses as $course)
                  <option value="{{$course->id}}">{{$course->course_name}}</option>
                @endforeach
              
            </select>
          </div>
      </div>
     @foreach($courses as $course)
       @echo $course->course_name;
      @endforeach
              


    <div class="col-md-1" style="height:380px;">

          <span style="position:absolute; top:0px;"><a href="#" onclick=""><img src="img/add.png"></a></span>
          <span style="position:absolute; bottom:0px;"><a href="#" onclick="r"><img src="img/remove.png"></a></span>
    </div>
    <div class="col-md-3"> 
         <div class="form-group">
          <strong>BATCH: ....| DEPARTMENT:----| SEMESTER: .... DUE DATE: ....</strong>
          <select class="form-control input-sm" id="courseandteacher" name="courseandteacher" multiple style="height:250px">
            
          </select>
        </div>
    <input type="hidden" name="valueset" id="valueset" />
    
    <span style="float:right;"><button type="submit" name="save" onclick="pushvalues()" class="btn btn-lg btn-success">Save</button></span>
  </div>

    </form>
    </div>
    </div>
@endsection