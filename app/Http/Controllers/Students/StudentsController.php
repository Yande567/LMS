<?php

namespace App\Http\Controllers\Students;

use App\Models\User;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\StudentsRegisterInfo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;

class StudentsController extends Controller
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

            if(!($user->role_id == 1 || $user->role_id == 2 )){
                abort(403);
            } elseif($user->role_id == 1){
                // Query to get all registered students
                $students = DB::table('students')->orderby('user_id', 'desc')->get();
                return view('Admin.view_students', compact('students'));
            }  elseif($user->role_id == 2){
                $students = DB::table('students')->orderby('user_id', 'desc')->get();
                return view('Librarian.view_students', compact('students'));
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

                return view('Admin.create_student');

            } elseif($user->role_id == 2){

                return view('Librarian.create_student');

            } else{
                abort(403);
            }

        }else{
            return redirect('/login');
        }
    }

    public function createStudent(Request $request){
        $rules = [
            'computer_number' => ['required', 'string', 'max:10', 'min:10', 'unique:students,'],
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'gender' => ['required', 'string', 'max:10'],
            'contact' => ['required', 'string', 'max:10', 'min:10', 'unique:students_id,contact'],
            'email' => ['required', 'string', 'unique:users,email'],
            'school' => ['required', 'string', 'max:50'],
        ];

        if(Auth::check()){
            $user = Auth::user();

            if(!($user->role_id == 1 || $user->role_id == 2)){
                abort(403);
            } else{
                 //validate inputs from request
                 $validator = Validator::make($request->all(), $rules);

                 if($validator->fails()){//if validation fails
                    //return back with validation error messages
                    $errors = $validator->errors();
                    return redirect()->back()->withErrors($errors)->withInput();;
                }else{

                    $create_user = User::create([
                        'role_id' => 1,
                        'email' => $request->email,
                        'password' => Hash::make($request->email),
                    ]);
                    
                    $user_id = DB::table('users')
                                ->where('email', $request->email)
                                ->value('id');
                    
                    $create_student = Students::create([
                        'user_id' => $user_id,
                        'first_name' => $request->first_name,
                        'last_name' => $request->last_name,
                        'gender' => $request->gender,
                        'contact' => $request->contact,
                        'school' => $request->school,
                        'student_id' => $request->computer_number,
                    ]);

                    return redirect()->back()->withErrors(['msg' => 'Student Created Succesfully']);
                }
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request, $id)
    {
        $registration_info = DB::table('students_registers')
                                ->where('id', $id)
                                ->first();
        
        $email_exists = DB::table('users')
                           ->where('email', $registration_info->email)->exists();
        $computer_number_exixts = DB::table('students')
                                ->where('student_id', $registration_info->computer_number)
                                ->exists();
        
        if(!($email_exists) && !($computer_number_exixts)){
            $user = User::create([
                'role_id' => 3,
                'email' => $registration_info->email,
                'password' => Hash::make($registration_info->email),
            ]);
    
            $user_id = DB::table('users')
                          ->where('email', $registration_info->email)
                          ->value('id');
    
            $students = Students::create([
                    'user_id' => $user_id,
                    'first_name' => $registration_info->first_name,
                    'last_name' => $registration_info->last_name,
                    'gender' => $registration_info->gender,
                    'contact' => $registration_info->contact,
                    'student_id' => $registration_info->computer_number,
            ]);
    
            $delete = StudentsRegisterInfo::where('id', $id)->firstorfail()->delete();
    
            return redirect()->back()->withErrors(['msg' => 'Student Registered Succesfully']);
        }else{
            return redirect()->back()->withErrors(['msg' => 'Student Email or ID Already Exists']);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentsRequest $request, Students $students)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students)
    {
        //
    }
}
