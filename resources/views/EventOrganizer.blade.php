@extends('layouts.user-app')
@section('title', 'Prognet | Home')
@section('contents')
    
<section class="organizer-section">
    <div class="container py-5">
        <div class="section-title">
            <div class="label-title d-flex justify-content-between">
                <h2>Event Organizer</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 py-3">
            <!-- Loop through event organizers and display cards -->
            @foreach($users as $user)
                <div class="col">
                    <div class="card creator border-0 shadow-none align-items-center" style="width: 18rem;">
                        @if ($user->foto)
                            <img src="{{ asset('storage/foto/' . $user->foto) }}" class="img-profile rounded-circle" alt="Profile Picture">
                        @else
                            <!-- If no image, you can display a default image -->
                            <img src="{{ asset('storage/foto/icon.jpeg') }}" class="img-profile rounded-circle" alt="Default Profile Picture">
                        @endif
                        <div class="card-body align-items-center">
                            <a href="#">
                                <h5 class="card-title">{{ $user->name }}</h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Organizer Section -->
@endsection