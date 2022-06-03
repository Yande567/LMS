@extends('layouts.librarian_nav')

@section('title')
    LMS | Issue History
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
                        @if($issue_history->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center"> 
                                    There are Currently No Issue Histories To Display.
                                    To issue a book, <a href="{{ route('issue_return_books') }}" class="link-secondary">click here</a>
                                </td>
                            </tr>
                        @else
                            @foreach ($issue_history as $history)
                                <tr>
                                    <td>{{ $history->book_id }}</td>
                                    <td>{{ $history->user_id }}</td>
                                    <td>{{ $history->status }}</td>
                                    <td>{{ $history->issue_date }}</td>
                                    <td>{{ $history->return_date }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <form method="GET" action="#">
                                                @csrf
                                                <button class="btn login-btn">Update</button>
                                            </form>
                                            
                                        </div>
                                    </td>

                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <form method="POST" action="#">
                                                @csrf
                                                <button class="btn login-btn btn-info">Edit</button>
                                            </form>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                        <a href="{{ route('issue_return_books') }}">
                            <button class="btn btn-secondary">Issue or Return Book</button> 
                        </a>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection