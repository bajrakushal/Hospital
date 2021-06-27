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
Route::get('/admin/appointment',[App\Http\Controllers\AppointmentController::class, 'appointShow'])->name('edit');
Route::get('/admin/prescription',[App\Http\Controllers\PrescriptionController::class, 'prescripShow'])->name('edit');




//doctor
Route::get('/doctor/dashboard',[App\Http\Controllers\DoctorController::class, 'dashboard'])->name('dashboard');
Route::get('/doctor/patient',[App\Http\Controllers\DoctorController::class, 'patient'])->name('patient');
Route::get('/doctors/{id}', [App\Http\Controllers\FetchController::class, 'GetDoctor']);
Route::get('/doctor/appointment/{appointment}/edit',[App\Http\Controllers\AppointmentController::class, 'edit']);
Route::patch('/doctor/appointment/{appointment}',[App\Http\Controllers\AppointmentController::class, 'update']);
Route::get('/doctor/prescription/{prescription}/edit',[App\Http\Controllers\PrescriptionController::class, 'edit']);
Route::put('/doctor/prescription/{prescription}/update',[App\Http\Controllers\PrescriptionController::class, 'update']);
Route::post('/doctor/appointment/{id}/delete',[App\Http\Controllers\AppointmentController::class, 'destroy']);


//appointment-patient
Route::post('/doctor/appointment',[App\Http\Controllers\AppointmentController::class, 'store']);
Route::get('/doctor/appointment',[App\Http\Controllers\AppointmentController::class, 'index']);
//Route::get('/doctor/appointment/edit/{appointment}',[App\Http\Controllers\AppointmentController::class, 'edit']);

//patient-route

//Route::get('/patient/appointment',[App\Http\Controllers\AppointmentController::class, 'display']);

//these routes are basically for the prescription created by patients
Route::get('/patient/prescription',[App\Http\Controllers\PrescriptionController::class, 'index']);
Route::get('/patient/prescription/create',[App\Http\Controllers\PrescriptionController::class, 'create']);
Route::post('/patient/prescription',[App\Http\Controllers\PrescriptionController::class, 'store']);

Route::get('/doctor/prescription',[App\Http\Controllers\PrescriptionController::class, 'doctorindex']);
Route::get('/patient/invoice/{id}',[App\Http\Controllers\PrescriptionController::class, 'invoice']);



Route::get('handle-payment', [App\Http\Controllers\PaymentController::class,'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [App\Http\Controllers\PaymentController::class,'paymentCancel'])->name('cancel.payment');;
Route::get('payment-success', [App\Http\Controllers\PaymentController::class,'paymentSuccess'])->name('success.payment');

//Profile

Route::get('/profile/{id}',[App\Http\Controllers\UserController::class,'viewProfile']);
Route::get('/profile/edit/{id}',[App\Http\Controllers\UserController::class,'editProfile']);
Route::put('/profile/doctor/{doctor}',[App\Http\Controllers\UserController::class, 'profileUpdate'])->name('profileUpdate');
Route::get('/profile/user/edit/{id}',[App\Http\Controllers\UserController::class,'editProfile']);
Route::put('/profile/user/{user}',[App\Http\Controllers\UserController::class, 'userUpdate'])->name('userUpdate');
Route::get('/profile/admin/edit/{id}',[App\Http\Controllers\UserController::class,'editProfile']);
Route::put('/profile/admin/{admin}',[App\Http\Controllers\UserController::class, 'adminUpdate'])->name('adminUpdate');


//Medicine

Route::get('/admin/medicine',[App\Http\Controllers\MedicineController::class,'index']);
Route::post('/admin/medicine',[App\Http\Controllers\MedicineController::class,'store']);
Route::get('/admin/medicine/create',[App\Http\Controllers\MedicineController::class,'create']);
Route::get('/admin/medicine/{medicine}/edit',[App\Http\Controllers\MedicineController::class, 'edit']);
Route::put('/admin/medicine/{medicine}/update',[App\Http\Controllers\MedicineController::class, 'update']);
Route::get('/admin/medicine/{medicine}/delete',[App\Http\Controllers\MedicineController::class, 'destroy']);



Route::get('/admin/status/{id}/{status}',[App\Http\Controllers\MedicineController::class,'status']);
Route::get('/show/{id}',[App\Http\Controllers\PrescriptionController::class, 'showPayment']);

//payment
Route::get('/patient/payment',[App\Http\Controllers\PaymentController::class, 'index']);