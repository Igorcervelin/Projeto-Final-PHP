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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');

Route::resource('course', 'CourseController');

Route::resource('enrollment', 'EnrollmentController');

Route::get('/admin/enroll/{idCourse}/{idStudent}', 'EnrollmentController@enrollAdm');

Route::get('/enrollment/authorize/{idCourse}/{idUser}', 'EnrollmentController@authorization');

Route::get('/enrollment/delete/{idCourse}/{idUser}', 'EnrollmentController@destroy');

Route::get('/course/{id}/delete', 'CourseController@destroy');

Route::get('/course/{id}/edit', 'CourseController@edit');

Route::resource('student', 'StudentController');

Route::get('/student/{id}/delete', 'StudentController@destroy');

Route::get('/student/{id}/updateUser', 'StudentController@updateUser');

Route::get('/admin/student/{id}/enroll', 'EnrollmentController@listCourses');

Route::get('/students/{id}/enroll', 'EnrollmentController@enroll');

Route::get('/students/registers', 'EnrollmentController@registers');

Route::resource('city', 'CityController');
