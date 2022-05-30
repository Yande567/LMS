<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredStudentController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'contact' => ['required', 'digits:10', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'student_number' => ['required', 'numeric' 'max:12'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => ['required']
        ]);

        $student = Student::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        $student_info = StudentInfo::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact' => $request->contact,
            'gender' => $request->gender,
            'student_number' => $request->student_number,
            'student_id' => Auth::id(),
            
        ]);

        event(new Registered($student));

        Auth::login($student);

        return redirect(RouteServiceProvider::HOME);
    }
}
