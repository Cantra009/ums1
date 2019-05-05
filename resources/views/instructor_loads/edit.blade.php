@extends('adminlte::page')

<script type="text/javascript">
    function movevalues(){
      var courses = document.getElementById("courses");
      //var teachers = document.getElementById("teachers");
      
      var course = courses.options[courses.selectedIndex].text;
      //var teacher = teachers.options[teachers.selectedIndex].text;      
      
      var courseval = courses.options[courses.selectedIndex].value;
      //var teacherval = teachers.options[teachers.selectedIndex].value;
      
    var x = document.getElementById("courseandteacher");
    var option = document.createElement("option");
    option.text = course;
    option.value = courseval;
    x.add(option);
        courses.remove(courses.selectedIndex);
    
    }
    
    function removevalues(){
            var x = document.getElementById("courseandteacher");
          
            var course = x.options[x.selectedIndex].text;
            
            var target = document.getElementById('courses');
            var option = document.createElement("option");
            option.value = course;
            option.text = course;
            target.add(option);
      x.remove(x.selectedIndex);
    
    }

  function pushvalues(){
    var courseandteacher = document.getElementById('courseandteacher');
    var values = new Array();
  
    for(var i=0; i < courseandteacher.options.length; i++){
      values.push(courseandteacher.options[i].value);
    }
   document.getElementById("valueset").value = values;
  }
    
    
var showOnlyOptionsSimilarToText = function (selectionEl, str, isCaseSensitive) {
    if (typeof isCaseSensitive == 'undefined')
        isCaseSensitive = true;
    if (isCaseSensitive)
        str = str.toLowerCase();

    var $el = $(selectionEl);

    $el.children("option:selected").removeAttr('selected');
    $el.val('');
    $el.children("option").hide();

    $el.children("option").filter(function () {
        var text = $(this).text();
        if (isCaseSensitive)
            text = text.toLowerCase();

        if (text.indexOf(str) > -1)
            return true;

        return false;
    }).show();

};


  </script>



@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Update Course Offering</h3>
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
    

      <form action="{{route('course_offerings.update',$courseOffering->id)}}" method="post">
      @csrf
      
        <div class="col-md-3">
          <div class="box-header with-border">
              <h3 class="box-title">Shift courses to right panel</h3>
          </div>
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="batch_id" value="{{$courseOffering->batch_id}}" />
          <input type="hidden" name="semester_id" value="{{$courseOffering->semester_id}}" />
          <input type="hidden" name="department_id" value="{{$courseOffering->department_id}}" />
          <input type="hidden" name="due_date" value="{{$courseOffering->due_date}}" />
          <input type="hidden" name="end_date" value="{{$courseOffering->end_date}}" />
          <input type="hidden" name="status" value="submit" />
          <div class="form-group">
            <input type="text"  class="form-control input-sm" placeholder="Search course here" id="coursesrc" name="coursesrc">
            <select class="form-control input-sm" id="courses" name="courses" multiple style="height:380px">
              
                @foreach($courses as $course)
                  <option value="{{$course->id}}">{{$course->course_name}}</option>
                @endforeach
              
            </select>
          </div>
      </div>
     
              


    <div class="col-md-1" style="height:10px;">

          <span style="position:absolute; top:100px;"><a href="#" onclick="movevalues()"><i class="fa fa-fw fa-chevron-right"></i></a></span>
          <span style="position:absolute; top:135px; bottom:0px;"><a href="#" onclick="removevalues()"><i class="fa fa-fw fa-chevron-left"></i></a></span>
    </div>
    <div class="col-md-3"> 
      <div class="box-header with-border">
              <h3 class="box-title">Selected Courses</h3>
          </div>
         <div class="form-group">
          <select class="form-control input-sm" id="courseandteacher" name="courseandteacher" multiple style="height:380px">
          @foreach ($courseOffering->courses as $course)
            <option value="{{$course->id}}">{{$course->course_name}}</option>
                @endforeach
          </select>
        </div>
    <input type="hidden" name="valueset" id="valueset" />
    <div class="box-footer">
                <span style="float:right;"><button type="submit" name="save" onclick="pushvalues()" class="btn btn-primary">Save</button></span>
    </div>
    
  </div>

    </form>
    </div>
    </div>
@endsection