<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\StudentsRegisterInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StudentsRegisterController extends Controller
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

            if(!($user->role_id == 1 || $user->role_id == 2)){
                abort(403);
            } elseif($user->role_id == 1){
                //DB Query to get all Librarians waiting to be registered
                $pending_requests = DB::table('students_registers')
                ->orderBy('created_at', 'desc')
                ->get();

                return view('Admin.register_students', compact('pending_requests'));
            } else{
                //DB Query to get all Librarians waiting to be registered
                $pending_requests = DB::table('students_registers')
                                    ->orderBy('created_at', 'desc')
                                    ->get();

                return view('Librarian.register_student', compact('pending_requests'));
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
        return view('auth.student-register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'contact' => ['required', 'numeric', 'digits:10', 'unique:students_registers,contact'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students_registers,email'],
            'school'=> ['required'],
            'computer_number' => ['required', 'string', 'max:10', 'min:10'],
        ]);
        
        $registration_info = DB::table('students_registers')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact' => $request->contact,
            'gender' => $request->gender,
            'email' => $request->email,
            'school' => $request->school,
            'computer_number' => $request->computer_number,
        ]);

        return Redirect::back()->withErrors(['msg' => 'Your registration information has been saved
            An email will be sent once your account has been created']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $info = StudentsRegisterInfo::where('id', $id)->firstorfail()->delete();
        return redirect()->back()->withErrors(['msg' => 'Student Registration Request Deleted Succesfully']);
    }
}
