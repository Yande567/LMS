@extends('layouts.librarian_nav')

@section('title')
    LMS | Add a Book
@endsection

@section('content')
    
<div class="add-books">
    <div class="container ">
        <div class="row justify-content-center align-items-center" id="row">
            <div id="column" class="col-md-6">
                <div id="add-book-box" class="col-md-12">
                    <form class="form" method="POST" action="{{ route('save-book') }}">
                        @csrf

                        <h3 class="text-center text-info">Add Book</h3>

                        <!--Book Title-->
                        <div class="form-group">
                            <label  for="book_title" class="text-info">Book Title:</label>
                            <input type="text" id="book_title" class="form-control" type="text" name="book_title" :value="old('book_title')" required autofocus>
                        </div>

                        <!-- ISBN -->
                        <div class="form-group">
                            <label for="isbn" class="text-info">ISBN:</label>
                            <input type="text" id="isbn" class="form-control" name="isbn" :value="old('isbn')" required autofocus>
                        </div>

                        <!--Publisher-->
                        <div class="form-group">
                            <label for="publisher" class="text-info">Publisher:</label>
                            <input type="text" id="publisher" class="form-control" name="publisher" :value="old('publisher')" required autofocus>
                        </div>
                        
                         <!-- Author First Name-->
                          <div class="form-group">
                            <label for="author_fname" class="text-info">Author First Name:</label>
                            <input id="author_fname" class="form-control" type="text" name="author_fname" :value="old('author_fname')" required autofocus>
                          </div>
                        
                        <!-- Author Last Name-->
                        <div class="form-group">
                            <label for="author_lname" class="text-info">Author Last Name:</label>
                            <input id="author_lname" class="form-control" type="text" name="author_lname" :value="old('author_lname')" required autofocus>
                          </div>

                        <!-- Edition -->
                        <div class="form-group">
                            <label for="edition" class="text-info">Edition:</label>
                            <input id="edition" class="form-control" type="text" name="edition" :value="old('edition')" required autofocus>
                        </div>

                        <!--Number of Copies-->
                        <div class="form-group">
                            <label for="number_of_copies" class="text-info">Number of Copies:</label>
                            <input id="number_of_copies" class="form-control" type="integer" name="number_of_copies" :value="old('number_of_copies')" required autofocus>
                        </div>

                        <!--Published Date-->
                        <div class="form-group">
                            <label for="publish_date" class="text-info">Date Published (YYYY/MM/DD):</label>
                            <input id="publish_date" class="form-control" type="text" name="publish_date" :value="old('publish_date')" required placeholder="YYYY/MM/DD">
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