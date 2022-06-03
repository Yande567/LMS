@extends('layouts.layouts')

    @section('title')
        LMS | Login
    @endsection

    @section('content')

    <div id="login" class="login-cards container">
            <div class="lib-container">
                <div id="login-row">
                    <div id="login-column" class="login-column">
                        <div id="login-box" class="col-md-12">
                            <form method="POST" action="{{ route('login') }}" id="form">
                                @csrf
                                <h3 class="lib-login text-center text-info">Login</h3>
        
                                <div class="form-group">
                                    <label for="email" class="text-info">Email:</label><br>
                                    <input type="email" name="email" id="email" class="form-control" :value="old('email')" required>
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

                                <div class="row">
                                    <div id="register-link" class="col text-right text-info">
                                        <a href="{{ route('register-librarian') }}" class="text-info">Librarian Register here</a>
                                    </div>
    
                                    <div id="register-link" class="col text-right text-info">
                                        <a href="{{ route('student-register') }}" class="text-info">Student Register here</a>
                                    </div>
                                </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
    
    @endsection
