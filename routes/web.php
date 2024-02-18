<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Register;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['guest'])->group(function () {
    // route register
    Route::get('register', Register::class)->name('register');
    // route login
    Route::get('login', Login::class)->name('login');

});

Route::middleware(['auth'])->group(function () {
    // route logout
    Route::get('logout', function () {
        auth()->logout();;
        return redirect('/');
    })->name('logout');
});
