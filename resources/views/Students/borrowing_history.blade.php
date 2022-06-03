@extends('layouts.student_nav')

@section('title')
    LMS | Borrowing History
@endsection

@section('content')
<div class="display-container container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>View Issue History</h4>
                </div>
                <div class="card-body">

                    <table id="issue-books-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Book ID</th>
                            <th>User ID</th>
                            <th>Status</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>

                        </tr>
                        </thead>
                        <tbody>
                        @if($history->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center"> 
                                    There are Currently No Issue Histories To Display.
                                    To borrow a book, kindly go to the library to get one.
                                </td>
                            </tr>
                        @else
                            @foreach ($history as $issue_history)
                                <tr>
                                    <td>{{ $issue_history->book_id }}</td>
                                    <td>{{ $issue_history->user_id }}</td>
                                    <td>{{ $issue_history->status }}</td>
                                    <td>{{ $issue_history->issue_date }}</td>
                                    <td>{{ $issue_history->return_date }}</td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection