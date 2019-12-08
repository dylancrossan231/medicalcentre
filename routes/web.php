<?php
# @Date:   2019-11-04T15:17:10+00:00
# @Last modified time: 2019-11-12T15:56:13+00:00




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
//home routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home', 'Admin\HomeController@index')->name('admin.home');
Route::get('/doctor/home', 'Doctor\HomeController@index')->name('doctoruser.home');
Route::get('/patient/home', 'Patient\HomeController@index')->name('patientuser.home');
Route::get('/doctors/patient/create', 'Doctor\PatientController@create')->name('doctorpatient.create');

//doctor routes
Route::get('/doctors/patient', 'Doctor\PatientController@index')->name('doctorpatient.index');
Route::get('/doctors/patient/{id}', 'Doctor\PatientController@show')->name('doctorpatient.show');
Route::get('/doctor/patient/create', 'Doctor\PatientController@create')->name('doctorpatient.create');
Route::post('/doctors/patient/store', 'Doctor\PatientController@store')->name('doctorpatient.store');
Route::delete('/doctors/patient/{id}', 'Doctor\PatientController@destroy')->name('doctorpatient.destroy');
Route::get('/doctor/patient/{id}/edit', 'Doctor\PatientController@edit')->name('doctorpatient.edit');
Route::put('/doctor/patient/{id}', 'Doctor\PatientController@update')->name('doctorpatient.update');

Route::get('/doctors/visit', 'Doctor\VisitController@index')->name('doctorvisit.index');
Route::get('/doctors/visit/{id}', 'Doctor\VisitController@show')->name('doctorvisit.show');
Route::get('/doctors/visit/create', 'Doctor\VisitController@create')->name('doctorvisits.create');
Route::post('/doctors/visit/store', 'Doctor\VisitController@store')->name('doctorvisit.store');
Route::delete('/doctors/visit/{id}', 'Doctor\VisitController@destroy')->name('doctorvisit.destroy');
Route::get('/doctors/visit/{id}/edit', 'Doctor\VisitController@edit')->name('doctorvisit.edit');
Route::put('/doctors/visit/{id}', 'Doctor\VisitController@update')->name('doctorvisit.update');

//patient routes
Route::get('/patient/profile', 'Patient\PatientController@index')->name('patientuser.profile');
Route::get('/patient/visit', 'Patient\VisitController@show')->name('patientvisit.show');


//admin routes
Route::get('/doctors/show/{id}', 'Admin\DoctorController@show')->name('doctor.show');
Route::get('/doctors/index', 'Admin\DoctorController@index')->name('doctor.index');
Route::get('/doctors/create', 'Admin\DoctorController@create')->name('doctor.create');
Route::post('/doctors/store', 'Admin\DoctorController@store')->name('doctor.store');
Route::delete('/doctors/{id}', 'Admin\DoctorController@destroy')->name('doctor.destroy');
Route::get('/doctor/{id}/edit', 'Admin\DoctorController@edit')->name('doctor.edit');
Route::put('/doctor/{id}', 'Admin\DoctorController@update')->name('doctor.update');

Route::get('/patients/index', 'Admin\PatientController@index')->name('patient.index');
Route::get('/patients/show/{id}', 'Admin\PatientController@show')->name('patient.show');
Route::get('/patients/create', 'Admin\PatientController@create')->name('patient.create');
Route::post('/patients/store', 'Admin\PatientController@store')->name('patient.store');
Route::delete('/patients/{id}', 'Admin\PatientController@destroy')->name('patient.destroy');
Route::get('/patient/{id}/edit', 'Admin\PatientController@edit')->name('patient.edit');
Route::put('/patient/{id}', 'Admin\PatientController@update')->name('patient.update');

Route::get('/visits/index', 'Admin\VisitController@index')->name('visit.index');
Route::get('/visits/show/{id}', 'Admin\VisitController@show')->name('visit.show');
Route::get('/visits/create', 'Admin\VisitController@create')->name('visit.create');
Route::post('/visits/store', 'Admin\VisitController@store')->name('visit.store');
Route::delete('/visits/{id}', 'Admin\VisitController@destroy')->name('visit.destroy');
Route::get('/visits/{id}/edit', 'Admin\VisitController@edit')->name('visit.edit');
Route::put('/visits/{id}', 'Admin\VisitController@update')->name('visit.update');


