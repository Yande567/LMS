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
                            <th>ISBN</th>
                            <th>Catgory</th>
                            <th>Suggested By</th>
                            

                        </tr>
                        </thead>
                        <tbody>
                        @if($suggestions->count() == 0)
                            <tr>
                                <td colspan="5" class="text-center"> 
                                    There are Currently No Books Suggestions in The Database.
                                </td>
                            </tr>
                        @else
                            @foreach ($suggestions as $suggest)
                                <tr>
                                    <td>{{ $suggest->title }}</td>
                                    <td>{{ $suggest->isbn }}</td>
                                    <td>{{ $suggest->category }}</td>
                                    <td>{{ $suggest->suggested_by }}</td>

                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            {!!Form::open(['action' => "{{ url('/students/register-student/delete'.$suggest->id) }}", 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                            {!!Form::close()!!}
                                            
                                        </div>
                                    </td>
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