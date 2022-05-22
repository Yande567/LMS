<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //
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
        //
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
        //
    }
}
public function postRegistration(Request $request){

		$validator = $request->validate([

				'first_name'			=> 'required|alpha',
				'last_name'			    => 'required|alpha',
				'gender'            	=> 'required',
				'contact'		        => 'required',
				'email'		        	=> 'required|email',
				'school'			    => 'required',
				'student-number'		=> 'required'

		]);

		if(!$validator) {
			return Redirect::route('student-register')
				->withErrors($validator)
				->withInput();   // fills the field with the old inputs that were correct

		} else {
			$student = students_register::create(array(
				'first_name'	=> $request->get('first_name'),
				'last_name'		=> $request->get('last_name'),
				'gender'		=> $request->get('gender'),
				'contact'		=> $request->get('contact'),
				'email'		    => $request->get('email'),
                'school'        => $request->get('school'),
				'student_number'=> $request->get('student-number'),
			));

			if($student){
				return Redirect::route('student-register')
					->with('global', 'You will be successfully registered!');
			}
		}
	}
