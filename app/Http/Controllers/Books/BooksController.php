<?php

namespace App\Http\Controllers\Books;

use App\Models\Books;
use App\Models\BookStatus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\StoreBooksRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UpdateBooksRequest;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if(Auth::check()){
            $books = DB::table('books')->orderby('author_lname', 'desc')->get();

            $user = Auth::user();

            if($user->role_id == 1){
                return view('Admin.view_books', compact('books'));
            }elseif($user->role_id == 2){
                return view('Librarian.view_books', compact('books'));
            }else{
                return view('Students.view_books', compact('books'));
            }

        } else{
            return redirect('/login');
        }
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->role_id == 1){
                return view('Admin.add_book');
            }elseif($user->role_id == 2){
                return view('Librarian.add_books');
            } else{
                abort(403);
            }
        }else{
            abort(403);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBooksRequest $request)
    {
        $rules = [
            'isbn' => ['required', 'string', 'max:13', 'min:13', 'unique:books,ISBN_number'],
            'book_title' => ['required', 'string'],
            'author_fname' => ['required', 'string', 'max:25'],
            'author_lname' =>  ['required', 'string', 'max:25'],
            'edition' =>  ['required', 'string', 'max:25'],
            'number_of_copies' => ['required', 'numeric', 'min:1'],
            'publish_date' => ['required', 'date_format:Y/m/d', 'before:now()'],
            'publisher' => ['required', 'string', 'max:50'],
        ];
         
        // Check if a User is Authenticated
        if(Auth::check()){
            $user = Auth::user();

            // Check if user is allowed to access the page
            if( !($user->role_id == 1 || $user->role_id ==2) ){
                abort(403);
            }else{
                //validate inputs from request
                $validator = Validator::make($request->all(), $rules);
                
                if($validator->fails()) { //if validation fails
                    //return back with validation error messages
                    $errors = $validator->errors();
                    return redirect()->back()->withErrors($errors);
                } else { //if validation is successful
                    
                    $books = Books::create([
                        'ISBN_number' => $request->isbn,
                        'book_title' => $request->book_title,
                        'author_fname' => $request->author_fname,
                        'author_lname' =>  $request->author_lname,
                        'edition' =>  $request->edition,
                        'number_of_copies' => $request->number_of_copies,
                        'publish_date' => $request->publish_date,
                        'publisher' => $request->publisher,
                        'created_by' =>$user->id,
                    ]);

                    $book_id = DB::table('books')->select('id')
                                  ->where('ISBN_number', '=', $request->isbn)
                                  ->get();
                    
                    // Update Book Status Table
                    $book_status = BookStatus::create([
                        'book_id' => $book_id[0]->id,
                        'number_of_availible_copies' => $request->number_of_copies,
                    ]);

                    return Redirect::back()->withErrors(['msg' => 'Book Added Succesfully']);
                        
                    }

            }
        } else{
            return redirect(RouteServiceProvider::HOME);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBooksRequest  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBooksRequest $request, Books $books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books)
    {
        //
    }
}
