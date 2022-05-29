<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
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

        if(Auth::check()){
            $user = Auth::user();

            if(!($user->role_id == 1)){
                abort(403);
            } else{
                //DB Query to get all Librarians waiting to be registered
                $pending_requests = DB::table('librarian_registration_infos')
                ->orderBy('created_at', 'desc')
                ->get();

                return view('Admin.register_librarian', compact('pending_requests'));
            }

        } else{
            return redirect(RouteServiceProvider::HOME);
        }

        
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
    public function destroy($id)
    {
        $info = LibrarianRegistrationInfo::where('id', $id)->firstorfail()->delete();
        echo ("Librarian Registration Record deleted successfully.");
        return redirect()->route('admin-register-librarian')
                         ->with('status','Librarian Registration Info Successfully Deleted');
    }
}
