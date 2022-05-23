@extends('layouts.nav')

@section('title')
    LMS | Dashboard
@endsection

@section('content')

<div class="side">
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-lock fa-fw me-3"></i><span>Home</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple">
            <i class="fas fa-chart-pie fa-fw me-3"></i><span>Currently Borrowed Books</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-chart-bar fa-fw me-3"></i><span>Suggest a Book</span></a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
              class="fas fa-globe fa-fw me-3"></i><span>Payments/Penalties</span></a>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->

</div>
    
@endsection