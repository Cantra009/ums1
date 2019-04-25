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
        return view('student');
        
    })->middleware('auth');

    
Route::get('/campus', function () {
        return view('campuses.index');
        
    })->middleware('auth');

Route::get('/departments', function () {
		
      return view('departments.index');
        
    })->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('students', 'StudentController');
Route::resource('campuses', 'CampusController');
Route::resource('batches', 'BatchController');
Route::resource('faculties', 'FacultyController');
Route::resource('classrooms', 'ClassroomController');
Route::resource('courses', 'CourseController');
Route::resource('departments', 'DepartmentController');
Route::resource('instructors', 'InstructorController');
Route::resource('sections', 'SectionController');
Route::resource('semesters', 'SemesterController');
