<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\customersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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