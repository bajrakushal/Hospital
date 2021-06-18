<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    $doctors = \App\Models\Doctor::all();
    return view('welcome',compact('doctors'));
});

Auth::routes(['verify' => true]);


Route::group(['middleware'=>['auth','isUser']],function (){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});

Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'admin'])->name('admin');
Route::get('/admin/patient',[App\Http\Controllers\AdminController::class, 'patient'])->name('patient');
Route::get('/admin/patient/{user}/edit',[App\Http\Controllers\UserController::class, 'edit'])->name('edit');
Route::patch('/admin/patient/{user}',[App\Http\Controllers\UserController::class, 'update'])->name('update');
Route::get('/admin/patient/delete/{id}',[App\Http\Controllers\AdminController::class, 'destroy'])->name('destroy');
Route::get('/admin/doctor',[App\Http\Controllers\DoctorController::class, 'index'])->name('index');
Route::get('/admin/doctor/create',[App\Http\Controllers\DoctorController::class, 'create'])->name('create');
Route::post('/admin/doctor',[App\Http\Controllers\DoctorController::class, 'store'])->name('store');
Route::get('/admin/doctor/{doctor}/edit',[App\Http\Controllers\DoctorController::class, 'edit'])->name('edit');
Route::patch('/admin/doctor/{doctor}',[App\Http\Controllers\DoctorController::class, 'update'])->name('update');
Route::delete('/admin/doctor/{doctor}',[App\Http\Controllers\DoctorController::class, 'destroy'])->name('destroy');

//doctor
Route::get('/doctor/dashboard',[App\Http\Controllers\DoctorController::class, 'dashboard'])->name('dashboard');
Route::get('/doctor/patient',[App\Http\Controllers\DoctorController::class, 'patient'])->name('patient');
Route::get('/doctors/{id}', [App\Http\Controllers\FetchController::class, 'GetDoctor']);
Route::get('/doctor/appointment/{appointment}/edit',[App\Http\Controllers\AppointmentController::class, 'edit']);
Route::patch('/doctor/appointment/{appointment}',[App\Http\Controllers\AppointmentController::class, 'update']);

//appointment-patient
Route::post('/doctor/appointment',[App\Http\Controllers\AppointmentController::class, 'store']);
Route::get('/doctor/appointment',[App\Http\Controllers\AppointmentController::class, 'index']);
//Route::get('/doctor/appointment/edit/{appointment}',[App\Http\Controllers\AppointmentController::class, 'edit']);

//patient-route

//Route::get('/patient/appointment',[App\Http\Controllers\AppointmentController::class, 'display']);
