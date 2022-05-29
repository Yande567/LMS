@extends('layouts.admin_nav')

@section('title')
    LMS | View Librarians
@endsection

@section('content')
    
<div class="display-container container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>View Librarians</h4>
                </div>
                <div class="card-body">

                    <table id="librarian-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Librarian ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>Gender</th>
                            <th>Email</th>
                            

                        </tr>
                        </thead>
                        <tbody>
                        @if($librarians->count() == 0 && $emails->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center"> 
                                    No Currently Registered Librarians.
                                    To add a librarian, <a href="{{ route('create-librarian') }}" class="link-secondary">click here</a>
                                </td>
                            </tr>
                        @else
                            @foreach ($librarians as $librarian)
                                <tr>
                                    <td>{{ $librarian->user_id }}</td>
                                    <td>{{ $librarian->first_name }}</td>
                                    <td>{{ $librarian->last_name }}</td>
                                    <td>{{ $librarian->contact }}</td>
                                    <td>{{ $librarian->gender }}</td>

                                    @foreach ($emails as $email )
                                    <td>{{ $email->email }}</td>
                                    @endforeach
                                    
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <form method="GET" action="#">
                                                @csrf
                                                <button class="btn login-btn">Edit</button>
                                            </form>
                                            
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <form method="POST" action="#">
                                                @csrf
                                                <button class="btn login-btn btn-danger">Delete</button>
                                            </form>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <a href="{{ route('create-librarian') }}">
                            <button class="btn btn-secondary">Add a Librarian</button> 
                        </a>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection