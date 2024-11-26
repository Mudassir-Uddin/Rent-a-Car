<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\brandsController;
use App\Http\Controllers\carsController;
use App\Http\Controllers\colorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\DbBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\payment_methodController;
use App\Http\Controllers\paymentsController;
use App\Http\Controllers\rentalsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('/');


// Dashboard

Route::get('/Admindashboard', [DashboardController::class, 'Admindashboard'])->name('Admindashboard');


// DB User

Route::get('/DbUsers', [UsersController::class, 'Users'])->name('DbUser');
Route::get('/UsersInsert', [UsersController::class, 'insert'])->name('UserInsert');
Route::post('/UsersStore', [UsersController::class, 'Store']);
Route::get('/Usersedit/{id}', [UsersController::class, 'edit']);
Route::post('/Usersupdate/{id}', [UsersController::class, 'update']);
Route::get('/Usersdelete/{id}', [UsersController::class, 'delete']);

// DB customer

Route::get('/Dbcustomers', [customersController::class, 'customers'])->name('Dbcustomer');
Route::get('/customersInsert', [customersController::class, 'insert'])->name('customerInsert');
Route::post('/customersStore', [customersController::class, 'Store']);
Route::get('/customersedit/{id}', [customersController::class, 'edit']);
Route::post('/customersupdate/{id}', [customersController::class, 'update']);
Route::get('/customersdelete/{id}', [customersController::class, 'delete']);

// DB cars

Route::get('/Dbcars', [carsController::class, 'cars'])->name('Dbcar');
Route::get('/carsInsert', [carsController::class, 'insert'])->name('carInsert');
Route::post('/carsStore', [carsController::class, 'Store']);
Route::get('/carsedit/{id}', [carsController::class, 'edit']);
Route::post('/carsupdate/{id}', [carsController::class, 'update']);
Route::get('/carsdelete/{id}', [carsController::class, 'delete']);

// DB Rentals

Route::get('/Dbrentals', [rentalsController::class, 'rentals'])->name('Dbrental');
Route::get('/rentalsInsert', [rentalsController::class, 'insert'])->name('rentalInsert');
Route::post('/rentalsStore', [rentalsController::class, 'Store']);
Route::get('/rentalsedit/{id}', [rentalsController::class, 'edit']);
Route::post('/rentalsupdate/{id}', [rentalsController::class, 'update']);
Route::get('/rentalsdelete/{id}', [rentalsController::class, 'delete']);

// DB payment_methods

Route::get('/Dbpayment_methods', [payment_methodController::class, 'payment_methods'])->name('Dbpayment_method');
Route::get('/payment_methodsInsert', [payment_methodController::class, 'insert'])->name('payment_methodInsert');
Route::post('/payment_methodsStore', [payment_methodController::class, 'Store']);
Route::get('/payment_methodsedit/{id}', [payment_methodController::class, 'edit']);
Route::post('/payment_methodsupdate/{id}', [payment_methodController::class, 'update']);
Route::get('/payment_methodsdelete/{id}', [payment_methodController::class, 'delete']);

// DB payments

Route::get('/Dbpayments', [paymentsController::class, 'payments'])->name('Dbpayment');
Route::get('/paymentsInsert', [paymentsController::class, 'insert'])->name('paymentInsert');
Route::post('/paymentsStore', [paymentsController::class, 'Store']);
Route::get('/paymentsedit/{id}', [paymentsController::class, 'edit']);
Route::post('/paymentsupdate/{id}', [paymentsController::class, 'update']);
Route::get('/paymentsdelete/{id}', [paymentsController::class, 'delete']);

//____________ Authentication _____________________
#region Auth
Route::get('/register', [AuthenticationController::class,'register']);
Route::post('/registerstore', [AuthenticationController::class,'registerstore']);
Route::get('/login', [AuthenticationController::class,'login']);
Route::post('/loginstore', [AuthenticationController::class,'loginstore']);
Route::get('/logout', [AuthenticationController::class,'logout']);
Route::get('/update', [AuthenticationController::class,'update']);
#endregion

// Dashboard Profile
Route::get('/Profileedit/{id}', [DashboardController::class,'profiles'])->name('WebProfile');
Route::post('/Profileupdate/{id}', [DashboardController::class,'update']);

// User Reset Password
Route::get('/passedit/{id}', [DashboardController::class,'passedit']);
Route::post('/passupdate/{id}', [DashboardController::class,'pasupdate']);


// Website Profile
Route::get('/WebProfileedit/{id}', [HomeController::class,'profiles'])->name('Profile');
Route::post('/WebProfileupdate/{id}', [HomeController::class,'update']);

// Db Booking

Route::get('/DbBookings', [DbBookingController::class,'Booking_Details'])->name('DbBooking')->middleware('admin');
Route::post('/DbBookingConfirm/{id}', [DbBookingController::class,'Booking_Confirm'])->name('DbBookingConfirm')->middleware('admin');
Route::get('/Bookingdelete/{id}', [DbBookingController::class,'delete'])->middleware('a');

//___ Booking ____
Route::get('/Booking/{id}', [BookingController::class,'Booking'])->name('Booking');
Route::get('/Booking_Details', [BookingController::class,'Booking_Details'])->name('Booking_Details');
Route::post('/BookingPost/{productId}', [BookingController::class,'BookingPost'])->name('BookingPost');
Route::post('/BookingConfirm/{id}', [BookingController::class,'Booking_Confirm'])->name('BookingConfirm');

// DB brand

Route::get('/Dbbrands', [brandsController::class, 'brands'])->name('Dbbrand');
Route::get('/brandsInsert', [brandsController::class, 'insert'])->name('brandInsert');
Route::post('/brandsStore', [brandsController::class, 'Store']);
Route::get('/brandsedit/{id}', [brandsController::class, 'edit']);
Route::post('/brandsupdate/{id}', [brandsController::class, 'update']);
Route::get('/brandsdelete/{id}', [brandsController::class, 'delete']);

// DB color

Route::get('/Dbcolors', [colorsController::class, 'colors'])->name('Dbcolor');
Route::get('/colorsInsert', [colorsController::class, 'insert'])->name('colorInsert');
Route::post('/colorsStore', [colorsController::class, 'Store']);
Route::get('/colorsedit/{id}', [colorsController::class, 'edit']);
Route::post('/colorsupdate/{id}', [colorsController::class, 'update']);
Route::get('/colorsdelete/{id}', [colorsController::class, 'delete']);