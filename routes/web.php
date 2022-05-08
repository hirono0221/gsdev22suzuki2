<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientlistController;
use App\Http\Controllers\PrescriptionController;

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



Route::get('/',[FrontendController::class, 'index']);

Route::get('/new-appointment/{coachId}/{date}',[FrontendController::class, 'show'])->name('create.appointment');


Route::group(['middleware'=>['auth','client']],function(){
	Route::post('/book/appointment',[FrontendController::class, 'store'])->name('booking.appointment');
	
	Route::get('/my-booking',[FrontendController::class, 'myBookings'])->name('my.booking');

	Route::get('/user-profile',[ProfileController::class, 'index']);
	Route::post('/user-profile',[ProfileController::class, 'store'])->name('profile.store');
    Route::post('/profile-pic',[ProfileController::class, 'profilePic'])->name('profile.pic');
	Route::get('/my-prescription',[FrontendController::class, 'myPrescription'])->name('my.prescription');	
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard',[DashboardController::class, 'index']);
Auth::routes();



Route::group(['middleware'=>['auth','admin']],function(){
	Route::resource('coach', CoachController::class);
	Route::get('/clients',[ClientlistController::class, 'index'])->name('client');
	Route::get('/clients/all',[ClientlistController::class, 'allTimeAppointment'])->name('all.appointments');
	Route::get('/status/update/{id}',[ClientlistController::class, 'toggleStatus'])->name('update.status');
});




Route::group(['middleware'=>['auth','coach']],function(){
    
    Route::resource('appointment', AppointmentController::class);
	Route::post('/appointment/check',[AppointmentController::class, 'check'])->name('appointment.check');
	Route::post('/appointment/update',[AppointmentController::class, 'updateTime'])->name('update');
	Route::get('client-today',[PrescriptionController::class, 'index'])->name('clients.today');

	Route::post('/prescription',[PrescriptionController::class, 'store'])->name('prescription');

	Route::get('/prescription/{userId}/{date}',[PrescriptionController::class, 'show'])->name('prescription.show');
	Route::get('/prescribed-clients',[PrescriptionController::class, 'clientsFromPrescription'])->name('prescribed.clients');

});