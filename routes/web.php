<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\Admin\LibrarianController;
use App\Http\Controllers\Admin\CreateLibrarianController;
use App\Http\Controllers\Students\StudentsRegisterController;
use App\Http\Controllers\Admin\LibrarianRegistrationInfoController;


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
    return view('auth.login');
})->middleware(['auth']);

require __DIR__.'/auth.php';

// Admin Routes

Route::prefix('/admin')->group(function () {

    Route::get('/dashboard', function() {
        return view('layouts.admin_nav');
    })->name('admin-dashboard');
    
    Route::get('/register-librarian', [LibrarianRegistrationInfoController::class, 
        'index'])->name('admin-register-librarian');
    
    Route::post('/register-librarian/save{id}', [LibrarianController::class, 
        'store'])->name('save-librarian');
    
    Route::delete('/register-librarian/delete{id}', [LibrarianRegistrationInfoController::class, 
        'delte'])->name('delete-librarian-registration-request');
    
    Route::get('/create-librarian', [CreateLibrarianController::class, 
        'create'])->name('create-librarian');
    
    Route::post('/save-librarian', [CreateLibrarianController::class, 
        'store'])->name('save_librarian');
    
});




// Librarian Routes

Route::prefix('/librarian')->group(function () {

    Route::get('/dashboard', function() {
        return view('layouts.librarian_nav');
    })->name('librarian-dashboard');
    
    Route::get('/register-librarian', [LibrarianRegistrationInfoController::class,
        'create'])->name('register-librarian');
    
    Route::post('/save-info', [LibrarianRegistrationInfoController::class,
        'store'])->name('save-librarian-reg-info');
    
});




// Students Routes

Route::prefix('/students')->group(function () {

    Route::get('/dashboard', function() {
        return view('Students.students_dashboard');
    })->name('students-dashboard');
    
    Route::get('/register', [StudentsRegisterController::class, 
        'create'])->name('student-register');
    
});


// Books Routes

Route::prefix('/books')->group(function () {

    Route::get('/add-book', [BooksController::class,
        'create'])->name('add-book');

    Route::post('/save-book', [BooksController::class,
        'store'])->name('save-book');

});

