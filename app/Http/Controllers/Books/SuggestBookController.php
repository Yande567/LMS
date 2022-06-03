<?php

namespace App\Http\Controllers\Books;

use App\Models\suggestBook;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoresuggestBookRequest;
use App\Http\Requests\UpdatesuggestBookRequest;

class SuggestBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();

            if(!($user->role_id == 2)){
                abort(403);
            } else{
                // Get all suggestions
                $suggestions = DB::table('suggest_books')->orderBy('category', 'desc')->get();
                return view('Librarian.view_book_suggestions', compact('suggestions'));
            }
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
            return view('Students.suggest_book');
        } else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoresuggestBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresuggestBookRequest $request)
    {
        $rules = [
            'title' => ['required', 'string',],
            'isbn' => ['required', 'string', 'max:13', 'min:13', 'unique:suggest_books,isbn'],
            'category' => ['required', 'string'],
        ];

        if(Auth::check()){
            //validate inputs from request
            $validator = Validator::make($request->all(), $rules);
                
            if($validator->fails()) { //if validation fails
                //return back with validation error messages
                $errors = $validator->errors();
                return redirect()->back()->withErrors($errors)->withInput();
            } else { //if validation is successful
                
                $user_id = Auth::id();
                
                $suggestion = suggestBook::create([
                    'title' => $request->title,
                    'isbn' => $request->isbn,
                    'category' => $request->category,
                    'suggested_by' => $user_id,
                ]);
                
                return Redirect::back()->withErrors(['msg' => 'Operation Completed Succesfully']);
                    
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\suggestBook  $suggestBook
     * @return \Illuminate\Http\Response
     */
    public function show(suggestBook $suggestBook)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\suggestBook  $suggestBook
     * @return \Illuminate\Http\Response
     */
    public function edit(suggestBook $suggestBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesuggestBookRequest  $request
     * @param  \App\Models\suggestBook  $suggestBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesuggestBookRequest $request, suggestBook $suggestBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\suggestBook  $suggestBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(suggestBook $suggestBook, $id)
    {
        dd($suggestBook->isbn);
        $delete_suggestion = DB::table('suggest_books')
                                ->where('isbn', $suggestBook->isbn)
                                ->delete();
        
        return redirect()->back()->withErrors(['msg' => 'Operation Performed Succesfully']);
    }
}
