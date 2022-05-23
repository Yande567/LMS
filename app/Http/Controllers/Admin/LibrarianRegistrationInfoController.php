<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\LibrarianRegistrationInfo;
use App\Http\Requests\StoreLibrarianRegistrationInfoRequest;
use App\Http\Requests\UpdateLibrarianRegistrationInfoRequest;

class LibrarianRegistrationInfoController extends Controller
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
        return view('auth.librarian-register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLibrarianRegistrationInfoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLibrarianRegistrationInfoRequest $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'contact' => ['required', 'numeric', 'digits:10'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:librarian_registration_infos'],
        ]);
        
        $registration_info = LibrarianRegistrationInfo::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact' => $request->contact,
            'gender' => $request->gender,
            'email' => $request->email,
        ]);

        return Redirect::back()->withErrors(['msg' => 'Your registration information has been saved
            An email will be sent once your account has been created']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LibrarianRegistrationInfo  $librarianRegistrationInfo
     * @return \Illuminate\Http\Response
     */
    public function show(LibrarianRegistrationInfo $librarianRegistrationInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LibrarianRegistrationInfo  $librarianRegistrationInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(LibrarianRegistrationInfo $librarianRegistrationInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLibrarianRegistrationInfoRequest  $request
     * @param  \App\Models\LibrarianRegistrationInfo  $librarianRegistrationInfo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLibrarianRegistrationInfoRequest $request, LibrarianRegistrationInfo $librarianRegistrationInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LibrarianRegistrationInfo  $librarianRegistrationInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(LibrarianRegistrationInfo $librarianRegistrationInfo)
    {
        //
    }
}
