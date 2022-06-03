@extends('layouts.librarian_nav')

@section('title')
    LMS | View Students
@endsection


@section('content')
<div class="display-container container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>View Students</h4>
                </div>
                <div class="card-body">

                    <table id="librarian-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Contact</th>
                            <th>School</th>
                            <th>Gender</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($students->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center"> 
                                    No Currently Registered Students.
                                    To add a student, <a href="{{ route('create-student') }}" class="link-secondary">click here</a>
                                </td>
                            </tr>
                        @else
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->student_id }}</td>
                                    <td>{{ $student->first_name }}</td>
                                    <td>{{ $student->last_name }}</td>
                                    <td>{{ $student->contact }}</td>
                                    <td>{{ $student->school }}</td>
                                    <td>{{ $student->gender }}</td>
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
                        <a href="{{ route('create-student') }}">
                            <button class="btn btn-secondary">Add a Student</button> 
                        </a>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection