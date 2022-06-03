@extends('layouts.admin_nav')

@section('title')
    LMS | Register Student
@endsection

@section('content')

    <div class="display-container container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Pending Student Registration Requests</h4>
                    </div>
                    <div class="card-body">

                        <table id="librarian-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Contact</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>School</th>
                                <th>Computer Number</th>
                                

                            </tr>
                            </thead>
                            <tbody>
                            @if($pending_requests->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center"> No Pending Requests Available</td>
                                </tr>
                            @else
                                @foreach ($pending_requests as $pending_request)
                                    <tr>
                                        <td>{{ $pending_request->first_name }}</td>
                                        <td>{{ $pending_request->last_name }}</td>
                                        <td>{{ $pending_request->contact }}</td>
                                        <td>{{ $pending_request->gender }}</td>
                                        <td>{{ $pending_request->email }}</td>
                                        <td>{{ $pending_request->school }}</td>
                                        <td>{{ $pending_request->computer_number }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <form method="POST" action="{{ url('/students/register-student/save'.$pending_request->id) }}">
                                                    @csrf
                                                    <button class="btn login-btn">Approve</button>
                                                </form>
                                                
                                                <form method="POST" action="{{ url('/students/register-student/delete'.$pending_request->id) }}">
                                                    @csrf
                                                    <button class="btn login-btn btn-danger">Delete</button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <a href="{{ route('create-student') }}">
                                <button class="btn btn-secondary">Create a Student</button> 
                            </a>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection