@extends('layouts.layouts')

@section('title')
    LMS Student Registration
@endsection

@section('content')
    
    <div class="register">
        <div class="container ">
            <div class="row justify-content-center align-items-center" id="row">
                <div id="column" class="col-md-6">
                    <div id="register-box" class="col-md-12">
                        <form class="form" method="POST" action="{{ route('register') }}">
                            @csrf
    
                            <h3 class="text-center text-info">Student Registration</h3>
    
                            <!--First Name-->
                            <div class="form-group">
                                <label  for="first_name" class="text-info">First Name:</label>
                                <input type="text" id="first_name" class="form-control" type="text" name="first_name" :value="old('first_name')" required autofocus>
                            </div>
    
                            <!--Last Name-->
                            <div class="form-group">
                                <label for="last_name" class="text-info">Last Name:</label>
                                <input type="text" id="last_name" class="form-control" name="last_name" :value="old('last_name')" required autofocus>
                            </div>
    
                            <!-- Gender -->
                            <div>
                                <div class="form-group">
                                    <label class="text-info">Gender:</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" value="Male" id="male" name="gender">
                                            <label class="custom-control-label" for="male">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" value="Female" id="female" name="gender">
                                            <label class="custom-control-label" for="female">Female</label>
                                        </div>
                                </div>
                            </div>
                            
                             <!-- Contact -->
                              <div class="form-group">
                                <label for="contact" class="text-info">Contact</label>
                                <input id="contact" class="form-control" type="integer" name="contact" :value="old('contact')" required autofocus>
                              </div>
    
                            <!--Email Address-->
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label>
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required>
                            </div>
                            
                            <!--Which School They Belong to-->
                            <div class="form-group">
                                <label for="school" class="text-info">School:</label>
                                <input type="text" id="school" class="form-control" name="school" :value="old('school')" required >
                            </div>

                            <!--Student Number-->
                            <div class="form-group">
                                <label for="student-number" class="text-info">School Number:</label>
                                <input type="text" id="student-number" class="form-control" name="student-number" :value="old('student-number')" required >
                            </div>
    
                            <div class="form-group flex items-center justify-end mt-4">
                                <a class="text-info" href="{{ route('login') }}">
                                    <h5>Already Registered?</h5>
                                </a>
    
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            


@endsection