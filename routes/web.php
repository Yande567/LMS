<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Books\BooksController;
use App\Http\Controllers\Admin\LibrarianController;
use App\Http\Controllers\Books\SuggestBookController;
use App\Http\Controllers\Students\StudentsController;
use App\Http\Controllers\Books\IssueHistoryController;
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
        'destroy'])->name('delete-librarian-registration-request');
    
    Route::get('/create-librarian', [CreateLibrarianController::class, 
        'create'])->name('create-librarian');
    
    Route::post('/save-librarian', [CreateLibrarianController::class, 
        'store'])->name('save_librarian');

    Route::get('/view-librarians', [LibrarianController::class,
         'index'])->name('view-librarians');
    
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
        return view('layouts.student_nav');
    })->name('students-dashboard');
    
    Route::get('/register', [StudentsRegisterController::class, 
        'create'])->name('student-register');

    Route::post('/store-info', [StudentsRegisterController::class,
        'store'])->name('store-info');

    Route::get('/student-registration-info', [StudentsRegisterController::class,
        'index'])->name('pending-requests');

    Route::post('/register-student/save{id}', [StudentsController::class, 
        'store'])->name('save-student');

    Route::delete('/register-student/delete/{id}', [StudentsRegisterController::class, 
        'destroy'])->name('delete-student-registration-info');

    Route::get('/create-student', [StudentsController::class, 
        'create'])->name('create-student');

    Route::post('/create-student/save', [StudentsController::class, 
        'createStudent'])->name('create-student-save');

    Route::get('/view', [StudentsController::class,
        'index'])->name('view-students');

    Route::get('/book_history', [IssueHistoryController::class, 
        'displayStudentHistory'])->name('display-borrow-history');
    
});


// Books Routes

Route::prefix('/books')->group(function () {

    Route::get('/add-book', [BooksController::class,
        'create'])->name('add-book');

    Route::post('/save-book', [BooksController::class,
        'store'])->name('save-book');

    Route::get('/view-books', [BooksController::class,
        'index'])->name('view-books');

    Route::get('/issue-books', [IssueHistoryController::class,
        'create'])->name('issue_return_books');

    Route::post('/issue-books/save', [IssueHistoryController::class,
        'store'])->name('issue_return_books_save');
    
    Route::post('/issue-books/update', [IssueHistoryController::class, 
        'update'])->name('issue_return_books_update');

    Route::get('/view-issued-books', [IssueHistoryController::class, 
        'index'])->name('view-issued-books');

    Route::get('/book-suggestions', [SuggestBookController::class, 
        'create'])->name('book-suggestion');

    Route::post('/book-suggestions/save', [SuggestBookController::class,
        'store'])->name('store-book-suggest');

    Route::get('/view-book-suggestions', [SuggestBookController::class, 
        'index'])->name('book_suggestion');

    Route::delete('/view-book-suggestions{id}', [SuggestBookController::class, 
        'destroy'])->name('delete-book-suggestion');

});

