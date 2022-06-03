@extends('layouts.librarian_nav')

@section('title')
    LMS | Issue/Return Book
@endsection

@section('content')
    <div class="issue_books">
        <div class="container ">
            <div class="row justify-content-center align-items-center" id="row">
                <div id="column" class="col-md-6">
                    <div id="issue-book-box" class="col-md-12">
                        <form class="form" method="POST" action="{{ route('issue_return_books_save') }}">
                            @csrf

                            <h3 class="text-center text-info">Issue / Return Book</h3>

                            <!--Student ID-->
                            <div class="form-group">
                                <label  for="student_id" class="text-info">Student ID:</label>
                                <input type="integer" id="student_id" class="form-control" type="text" name="student_id" :value="old('student_id')" required autofocus>
                            </div>

                            <!--Book ID-->
                            <div class="form-group">
                                <label for="book_id" class="text-info">Book ID:</label>
                                <input type="integer" id="book_id" class="form-control" name="book_id" :value="old('book_id')" required autofocus>
                            </div>

                             <!--Return Date-->
                            <div class="form-group">
                                <label for="return_date" class="text-info">Return Date (YYYY/MM/DD):</label>
                                <input id="return_date" class="form-control" type="text" name="return_date" :value="old('return_date')" required placeholder="YYYY/MM/DD">
                            </div>

                            <!--Issue or Return-->
                            <div>
                                <div class="form-group">
                                    <label class="text-info">Status:</label>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" value="Issued" id="issue" name="status">
                                            <label class="custom-control-label" for="issue">Issue Book</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline">
                                            <input class="custom-control-input" type="radio" value="Returned" id="returned" name="status">
                                            <label class="custom-control-label" for="returned">Return Book</label>
                                        </div>
                                </div>
                            </div>


                            <div class="form-group flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection