<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsRegisterController;
use App\Http\Controllers\LibrarianRegistrationController;

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
Route::get('/dashboard', function (){
    return view('dashboard');
});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Librarian Routes
Route::get('/register-librarian', [LibrarianRegistrationController::class,
    'create'])->name('register-librarian');


//Students Routes
Route::get('/student-register', [StudentsRegisterController::class, 
    'create'])->name('student-register');

