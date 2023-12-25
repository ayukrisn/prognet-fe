<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- Bootstrap Template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.2/font/bootstrap-icons.min.css" integrity="sha512-D1liES3uvDpPrgk7vXR/hR/sukGn7EtDWEyvpdLsyalQYq6v6YUsTUJmku7B4rcuQ21rf0UTksw2i/2Pdjbd3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- CSS -->
    <link href="{{ asset('admin_assets/css/user-styles.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Navbar -->
    @include('layouts.user-navbar')
    <!-- End Navbar -->

    {{-- Main Content --}}
    @yield('contents')
    {{-- End Main Content --}}

{{-- Footer --}}
<div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="navbar-brand me-auto text-muted">&copy; 2023 Festifind</p>
  
      <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="#" class="nav-link px-2">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Event</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Ticket</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2">Event Creator</a></li>
      </ul>
    </footer>
  </div>
{{-- End Footer --}}

<!-- Back to top button -->
    <button type="button" class="btn btn-floating btn-lg" id="btn-back-to-top">
        <i class="bi bi-arrow-up-short"></i>
    </button>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>

<!-- JS -->
<script src="{{ asset('admin_assets/js/scripts.js') }}"></script>
</body>

</html>