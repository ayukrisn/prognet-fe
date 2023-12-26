<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon ">
          <img src="{{ asset('storage/foto/images-removebg-preview.png') }}" alt="images" style="width: 100%; height: 100%;">
        </div>
        <div class="sidebar-brand-text mx-3">Festifind</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard Admin -->
    @if (auth()->user()->role == 'Admin')
    <li class="nav-item">
        <a class="nav-link" href="/users">
            <i class="fa-solid fa-user"></i>
            <span>Users</span></a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link"href="{{ route('kategori.index') }}">
            <i class="fa-solid fa-layer-group"></i>
            <span>Add Categories</span></a>
    </li>

    
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
      aria-expanded="true" aria-controls="collapseTwo">
      <i class="fa-solid fa-calendar-days"></i>
      <span>Event</span>
    </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
          <!--<h6 class="collapse-header">Custom Components:</h6>-->
          <a class="collapse-item" href="{{ route('festivals') }}">Lihat Event</a>
          <a class="collapse-item" href="{{ route('events.index') }}">Eventmu</a>
      </div>
    </div>
  </li>
    @endif
    <!-- Nav Item - End Dashboard Admin -->


    <!-- Nav Item - Dashboard Event -->
    @if (auth()->user()->role == 'Event')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
          aria-expanded="true" aria-controls="collapseTwo">
          <i class="fa-solid fa-calendar-days"></i>
          <span>Event</span>
        </a>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <!--<h6 class="collapse-header">Custom Components:</h6>-->
              <a class="collapse-item" href="{{ route('festivals') }}">Lihat Event</a>
              <a class="collapse-item" href="{{ route('events.index') }}">Eventmu</a>
          </div>
        </div>
    </li>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
