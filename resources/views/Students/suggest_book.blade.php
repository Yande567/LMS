@extends('layouts.student_nav')

@section('title')
    LMS | Suggest a Book
@endsection

@section('content')
<div class="issue_books">
    <div class="container ">
        <div class="row justify-content-center align-items-center" id="row">
            <div id="column" class="col-md-6">
                <div id="issue-book-box" class="col-md-12">
                    <form class="form" method="POST" action="{{ route('store-book-suggest') }}">                        @csrf

                        <h3 class="text-center text-info">Issue / Return Book</h3>

                        <!--Book Name-->
                        <div class="form-group">
                            <label  for="title" class="text-info">Title:</label>
                            <input type="string" id="title" class="form-control" type="text" name="title" :value="old('title')" required autofocus>
                        </div>

                        <!--ISBN-->
                        <div class="form-group">
                            <label for="isbn" class="text-info">ISBN:</label>
                            <input type="string" id="isbn" class="form-control" name="isbn" :value="old('isbn')" required autofocus>
                        </div>

                         <!--Category-->
                        <div class="form-group">
                            <label for="category" class="text-info">Category:</label>
                            <input id="category" class="form-control" type="text" name="category" :value="old('category')" required>
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