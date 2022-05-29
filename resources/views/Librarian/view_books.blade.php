@extends('layouts.librarian_nav')

@section('title')
    LMS | View Books
@endsection

@section('content')
<div class="display-container container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h4>View All Books</h4>
                </div>
                <div class="card-body">

                    <table id="librarian-table" class="table table-bordered table-striped">
                        <thead>
                        <tr>

                            <th>Book Title</th>
                            <th>Author First Name</th>
                            <th>Author Last Name</th>
                            <th>Edition</th>
                            <th>Publish Date</th>
                            <th>Publisher</th>
                            

                        </tr>
                        </thead>
                        <tbody>
                        @if($books->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center"> 
                                    There are Currently No Books in The Database.
                                    To add a book, <a href="{{ route('add-book') }}" class="link-secondary">click here</a>
                                </td>
                            </tr>
                        @else
                            @foreach ($books as $book)
                                <tr>
                                    <td>{{ $book->book_title }}</td>
                                    <td>{{ $book->author_fname }}</td>
                                    <td>{{ $book->author_lname }}</td>
                                    <td>{{ $book->edition }}</td>
                                    <td>{{ $book->publish_date }}</td>
                                    <td>{{ $book->publisher }}</td>
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
                        <a href="{{ route('add-book') }}">
                            <button class="btn btn-secondary">Add a Book</button> 
                        </a>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection