<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('');
});

Route::get('/', function () {
        return view('home');
    })->middleware('auth');

  
Route::get('/students', function () {
        return view('students.index');
        
    })->middleware('auth');

    
Route::get('/campus', function () {
        return view('campuses.index');
        
    })->middleware('auth');

Route::get('/departments', function () {
		
      return view('departments.index');
        
    })->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('students', 'StudentController')->middleware('auth');
Route::resource('campuses', 'CampusController')->middleware('auth');
Route::resource('batches', 'BatchController')->middleware('auth');
Route::resource('faculties', 'FacultyController')->middleware('auth');
Route::resource('classrooms', 'ClassroomController')->middleware('auth');
Route::resource('courses', 'CourseController')->middleware('auth');
Route::resource('departments', 'DepartmentController')->middleware('auth');
Route::resource('instructors', 'InstructorController')->middleware('auth');
Route::resource('sections', 'SectionController')->middleware('auth');
Route::resource('semesters', 'SemesterController')->middleware('auth');
Route::resource('course_offerings', 'CourseOfferingController')->middleware('auth');

