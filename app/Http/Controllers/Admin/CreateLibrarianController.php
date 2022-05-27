<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Librarian;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\LibrarianRegistrationInfo;
use App\Http\Requests\StoreLibrarianRequest;
use App\Http\Requests\UpdateLibrarianRequest;
use App\Http\Controllers\Admin\LibrarianRegistrationInfoController;

class CreateLibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.create_librarian');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLibrarianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'contact' => ['required', 'digits:10', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required']
        ]);

        if(Auth::check()){
            $user_id = Auth::user();

            if($user_id->role_id == 1){
                $user = User::create([
                    'role_id' => 2,
                    'email' => $request->email,
                    'password' => Hash::make($request->email),
                ]);
        
                $user_id = DB::table('users')
                              ->where('email', $request->email)
                              ->value('id');
        
                $librarian = Librarian::create([
                        'user_id' => $user_id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'gender' => $request->gender,
                        'contact' => $request->contact,
                ]);
        
                return redirect()->back()->withErrors(['msg' => 'Librarian Registered Succesfully']);
            }else{
                abort(403);
            }
        }else{
            abort(403);
        }
        
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function show(Librarian $librarian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function edit(Librarian $librarian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLibrarianRequest  $request
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibrarianRequest $request, Librarian $librarian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Librarian $librarian)
    {
        //
    }
}
