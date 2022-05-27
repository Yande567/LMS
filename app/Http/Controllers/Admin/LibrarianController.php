<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Librarian;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\LibrarianRegistrationInfo;
use App\Http\Requests\StoreLibrarianRequest;
use App\Http\Requests\UpdateLibrarianRequest;
use App\Http\Controllers\Admin\LibrarianRegistrationInfoController;

class LibrarianController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLibrarianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibrarianRequest $request, $id)
    {
        $registration_info = DB::table('librarian_registration_infos')
                                ->where('id', $id)
                                ->first();
        
        $user = User::create([
            'role_id' => 2,
            'email' => $registration_info->email,
            'password' => Hash::make($registration_info->email),
        ]);

        $user_id = DB::table('users')
                      ->where('email', $registration_info->email)
                      ->value('id');

        $librarian = Librarian::create([
                'user_id' => $user_id,
                'first_name' => $registration_info->first_name,
                'last_name' => $registration_info->last_name,
                'gender' => $registration_info->gender,
                'contact' => $registration_info->contact,
        ]);

        $delete = LibrarianRegistrationInfo::where('id', $id)->firstorfail()->delete();

        return redirect()->back()->withErrors(['msg' => 'Librarian Registered Succesfully']);
        
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
