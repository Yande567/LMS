@extends('layouts.layouts')

    @section('title')
        LMS Login
    @endsection

    @section('content')
    <div id="login" class="container">
        <div class="">
            <div class="container">
                <div id="login-row" class="row">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form method="POST" action="{{ route('login') }}" id="form">
                                @csrf
                                <h3 class="lib-login text-center text-info">Librarian Login</h3>
        
                                <div class="form-group">
                                    <label for="email" class="text-info">Email:</label><br>
                                    <input type="email" name="email" id="email" class="form-control" :value="old('email')" required autofocus>
                                </div>
        
                                <div class="form-group">
                                    <label for="password" class="text-info">Password:</label><br>
                                    <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password">
                                </div>
                                
                                <div class="form-group">
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary login-btn">Login</button>
        
                                    <div class="flex items-center justify-end mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="text-info" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                        
                                        
                                    </div>
                                </div>
                                    
                                <div id="register-link" class="text-right text-info">
                                    <a href="{{ route('register') }}" class="text-info">Register here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="container row">
                <div id="student-login-row" class="row">
                    <div id="student-login-column" class="col-md-6">
                        <div id="student-login-box" class="col-md-12">
                            <form action="POST" method="">
                                @csrf
                                <h3 class="lib-login text-center text-info">Student Login</h3>
        
                                <div class="form-group">
                                    <label for="student_number" class="text-info">Student Number:</label><br>
                                    <input type="integer" name="student_number" id="student_number" class="form-control" :value="old('student_number')" required autofocus>
                                </div>
        
                                <div class="form-group">
                                    <label for="password" class="text-info">Password:</label><br>
                                    <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password">
                                </div>
                                
                                <div class="form-group">
                                    <div class="block mt-4">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                        </label>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary login-btn">Login</button>
        
                                    <div class="flex items-center justify-end mt-4">
                                        @if (Route::has('password.request'))
                                            <a class="text-info" href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                        @endif
                        
                                        
                                    </div>
                                </div>
                                    
                                <div id="register-link" class="text-right text-info">
                                    <a href="{{ route('register') }}" class="text-info">Register here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    @endsection
