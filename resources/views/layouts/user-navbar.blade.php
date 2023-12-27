<nav class="navbar navbar-expand-lg fixed-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand me-auto" href="#">Festifind</a>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Festifind</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center align-items-baseline flex-grow-1 pe-3">
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link {{ Request::is('UserDashboard') ? 'active' : '' }}" aria-current="page" href="/UserDashboard">Home</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link {{ Request::is('Event') ? 'active' : '' }}" aria-current="page" href="/Event">Event</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link {{ Request::is('payment') ? 'active' : '' }}" href="/payment" aria-current="page">Payment</a>
                    </li>
                    <li class="nav-item mx-lg-2">
                        <a class="nav-link {{ Request::is('EventOrganizer') ? 'active' : '' }}" aria-current="page" href="/EventOrganizer">Event Organizer</a>
                    </li>
                </ul>
                @guest
                <ul class="navbar-nav align-items-baseline">
                    <li class="nav-item">
                        <a href="#" class="nav-link mx-lg-2">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="register-button">Register</a>
                    </li>
                </ul>
                @else
                <div class="d-flex navbar-profile align-items-center" onclick="toggleMenu()">
                    @if (auth()->user()->foto)
                                <img src="{{ asset('storage/foto/' . auth()->user()->foto) }}" class="profile-pic rounded-circle" alt="Profile Picture">
                            @else
                                <img src="{{ asset('storage/foto/icon.jpeg') }}" class="profile-pic rounded-circle" alt="Default Profile Picture">
                            @endif
                    <div class="d-flex flex-column">
                        <h5>{{ auth()->user()->name }}</h5>
                    </div>
                </div>
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info d-flex align-items-center">
                            @if (auth()->user()->foto)
                                <img src="{{ asset('storage/foto/' . auth()->user()->foto) }}" class="profile-pic rounded-circle" alt="Profile Picture">
                            @else
                                <img src="{{ asset('storage/foto/icon.jpeg') }}" class="profile-pic rounded-circle" alt="Default Profile Picture">
                            @endif
                            <div class="d-flex flex-column">
                                <h7 class="text-muted">Hi there,</h7>
                                <h5>{{ auth()->user()->name }}</h5>
                            </div>
                        </div>
                        <hr>
                        <a href="{{ route('profile', auth()->user()->id) }}" class="sub-menu-link">
                            <i class="bi bi-person-fill"></i>
                            <p>Edit Profile</p>
                            <span>></span>
                        </a>
                        <a href="/logout" class="sub-menu-link">
                            <i class="bi bi-box-arrow-right"></i>
                            <p>Log Out</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
                @endguest
            </div>
        </div>
        <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>