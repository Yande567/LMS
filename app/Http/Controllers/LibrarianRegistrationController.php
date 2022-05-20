<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibrarianRegistrationController extends Controller
{
    //Display all librarians waiting to be registered
    public function index(){
        //
    }

    //Display page where a librarian can register their details
    public function create(){
        return view('auth.librarian-register');
    }

    //Save librarian registration information
    public function store(){

    }

    //Delete Librarian Information from database
    public function destroy(){
        //
    }

}
