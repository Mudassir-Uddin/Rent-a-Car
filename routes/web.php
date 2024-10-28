<?php

use App\Http\Controllers\carsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\payment_methodController;
use App\Http\Controllers\paymentsController;
use App\Http\Controllers\rentalsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});


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
