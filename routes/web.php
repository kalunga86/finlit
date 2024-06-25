<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bills', BillController::class .'@index')->name('bills');
    Route::get('/bills/new', BillController::class . '@new')->name('bills.new');
    Route::post('/bills', BillController::class .'@store')->name('bills.store');
    Route::get('/bills/{id}', BillController::class .'@show')->name('bills.show');
    Route::get('/bills/{id}/edit', BillController::class .'@edit')->name('bills.edit');
    Route::put('/bills/{id}', BillController::class .'@update')->name('bills.update');
    Route::delete('/bills/{id}', BillController::class .'@destroy')->name('bills.destroy');

    Route::get('/categories', CategoryController::class .'@index')->name('categories');
    Route::get('/categories/new', CategoryController::class . '@new')->name('categories.new');
    Route::post('/categories', CategoryController::class .'@store')->name('categories.store');
    Route::get('/categories/{id}', CategoryController::class .'@show')->name('categories.show');
    Route::get('/categories/{id}/edit', CategoryController::class .'@edit')->name('categories.edit');
    Route::put('/categories/{id}', CategoryController::class .'@update')->name('categories.update');
    Route::delete('/categories/{id}', CategoryController::class .'@destroy')->name('categories.destroy');

    Route::get('/clients', ClientController::class .'@index')->name('clients');
    Route::get('/clients/new', ClientController::class . '@new')->name('clients.new');
    Route::post('/clients', ClientController::class .'@store')->name('clients.store');
    Route::get('/clients/{id}', ClientController::class .'@show')->name('clients.show');
    Route::get('/clients/{id}/edit', ClientController::class .'@edit')->name('clients.edit');
    Route::put('/clients/{id}', ClientController::class .'@update')->name('clients.update');
    Route::delete('/clients/{id}', ClientController::class .'@destroy')->name('clients.destroy');

    Route::get('/expenses', ExpenseController::class .'@index')->name('expenses');
    Route::get('/expenses/new', ExpenseController::class . '@new')->name('expenses.new');
    Route::post('/expenses', ExpenseController::class .'@store')->name('expenses.store');
    Route::get('/expenses/{id}', ExpenseController::class .'@show')->name('expenses.show');
    Route::get('/expenses/{id}/edit', ExpenseController::class .'@edit')->name('expenses.edit');
    Route::put('/expenses/{id}', ExpenseController::class .'@update')->name('expenses.update');
    Route::delete('/expenses/{id}', ExpenseController::class .'@destroy')->name('expenses.destroy');

    Route::get('/payments', PaymentController::class .'@index')->name('payments');
    Route::get('/payments/new', PaymentController::class . '@new')->name('payments.new');
    Route::post('/payments', PaymentController::class .'@store')->name('payments.store');
    Route::get('/payments/{id}', PaymentController::class .'@show')->name('payments.show');
    Route::get('/payments/{id}/edit', PaymentController::class .'@edit')->name('payments.edit');
    Route::put('/payments{id}', PaymentController::class .'@update')->name('payments.update');
    Route::delete('/payments/{id}', PaymentController::class .'@destroy')->name('payments.destroy');

    Route::get('/vendors', VendorController::class .'@index')->name('vendors');
    Route::get('/vendors/new', VendorController::class . '@new')->name('vendors.new');
    Route::post('/vendors', VendorController::class .'@store')->name('vendors.store');
    Route::get('/vendors/{id}', VendorController::class .'@show')->name('vendors.show');
    Route::get('/vendors/{id}/edit', VendorController::class .'@edit')->name('vendors.edit');
    Route::put('/vendors/{id}', VendorController::class .'@update')->name('vendors.update');
    Route::delete('/vendors/{id}', VendorController::class .'@destroy')->name('vendors.destroy');

    Route::get('/wallets', WalletController::class .'@index')->name('wallets');
    Route::get('/wallets/new', WalletController::class . '@new')->name('wallets.new');
    Route::post('/wallets', WalletController::class .'@store')->name('wallets.store');
    Route::get('/wallets/{id}', WalletController::class .'@show')->name('wallets.show');
    Route::get('/wallets/{id}/edit', WalletController::class .'@edit')->name('wallets.edit');
    Route::put('/wallets/{id}', WalletController::class .'@update')->name('wallets.update');
    Route::delete('/wallets/{id}', WalletController::class .'@destroy')->name('wallets.destroy');
});

require __DIR__.'/auth.php';
