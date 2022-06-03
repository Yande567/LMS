<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/side-nav.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/messages.css') }}">
    <title> @yield('title') </title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#"><h2>LMS</h2></a>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">User Settings</a>
                    <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="logout">Log Out</button>
                    </form>
                  </div>
                </li>
            </div>
          </nav>
   </header>

   <div class="side">
      <!-- Sidebar -->
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar">
        <div class="position-sticky">
          <div class="list-group list-group-flush mx-3 mt-4">
            <a href="{{ route('view-books') }}" class="list-group-item list-group-item-action py-2 ripple">
              <span>Books</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
              <span>All Waiting Students</span>
            </a>
            <a href="{{ route('pending-requests') }}" class="list-group-item list-group-item-action py-2 ripple">
              <span>Register Students</span>
            </a>
            <a href="{{ route('view-students') }}" class="list-group-item list-group-item-action py-2 ripple">
              <span>Registered Students</span>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple">
              <span>Payments/Penalties</span>
            </a>
            <a href="{{ route('add-book') }}" class="list-group-item list-group-item-action py-2 ripple">
              <span>Add Book</span>
            </a>
            <a href="{{ route('issue_return_books') }}" class="list-group-item list-group-item-action py-2 ripple">
              <span>Issue/Return Books</span>
            </a>
            <a href="{{ route('view-issued-books') }}" class="list-group-item list-group-item-action py-2 ripple">
              <span>View Issued Books</span>
            </a>
            <a href="{{ route('book_suggestion') }}" class="list-group-item list-group-item-action py-2 ripple">
              <span>View Book Suggestions</span>
            </a>
          </div>
        </div>
      </nav>
      <!-- Sidebar -->

    </div>
 
      @if($errors->any())
          @foreach ($errors->all() as $error)
              <div class="alert alert-primary" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  
                  <h4>{{$error}}</h4>
              </div>
          @endforeach
      @endif
      
   @yield('content')

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>