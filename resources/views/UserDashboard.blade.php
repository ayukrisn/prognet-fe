@extends('layouts.user-app')
@section('title', 'Prognet | Home')
@section('contents')
    <!-- Hero Section -->
    <section class="hero-section"
        style="background: url({{ asset('storage/foto/kecak.jpg') }}) no-repeat center;
        background-size: cover; width: 100%; height: 100vh;">
        <div class="container d-flex align-items-center justify-content-center fs-1 text-white flex-column">
            <h1>Festifind</h1>
            <p>Looking for an event? We can help you!</p>
            <!-- <div class="box">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" name="" placeholder="Start searching for an event" />
            </div> -->
        </div>
    </section>
    <!-- End Hero Section -->

    <!-- Category Section -->
<section class="section-category">
    <div class="container py-5">
        <div class="section-title">
            <div class="label-title d-flex justify-content-between">
                <h2>Kategori Event</h2>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-4 g-4 py-3">
            @foreach($kategori as $category)
                <div class="col-sm-auto">
                    <a href="{{ route('kategori.show', $category->id) }}">
                        <div class="category card shadow-sm">
                            <div class="category card-body">
                                <h5 class="card-title">{{ $category->nama }}</h5>
                                <p class="card-text text-muted">{{ $category->events->count() }} Event tersedia</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Category Section -->


    <hr>

    <!-- Event Section 1 -->
<section class="event-section">
    <div class="container py-5">
        <div class="section-title">
            <div class="label-title d-flex justify-content-between">
                <h2>Event Pilihan</h2>
                <p><a class="link" href="{{ route('event.all') }}">Lihat Semua Event</a></p>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-3">
            <!-- Loop through events and display cards -->
            @foreach($events as $event)
                <div class="col">
                    <div class="card shadow-sm">
                        @if ($event->foto)
                            <img src="{{ asset('storage/foto/' . $event->foto) }}" class="card-img-top" alt="Event Image">
                        @else
                            <!-- If no image, you can display a default image -->
                            <img src="admin_assets/fe/images/event-1.jpeg" class="card-img-top" alt="Default Event Image">
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">{{ $event->name }}</h4>
                            <p class="card-text text-muted">{{ $event->date_start }} s/d {{ $event->date_end }}</p>
                            <p class="card-text">{{ \Illuminate\Support\Str::limit($event->description, 50, '...') }}</p>
                            <!-- Change 50 to the maximum number of characters you want to display -->
                            <div class="d-flex justify-content-between align-items-baseline">
                                @if ($event->price > 0)
                                <p class="card-text card-price">Rp. {{ $event->price }}</small></p>
                                @else
                                <p class="card-text card-price">Gratis</small></p>
                                @endif
                                <a href="{{ route('event.details', ['id' => $event->id]) }}" class="btn btn-primary">Detail</a>
                            </div>
                            <div class="card-footer d-flex justify-content-start align-items-center">
                                @if ($event->user->foto)
                                    <img src="{{ asset('storage/foto/' . $event->user->foto) }}" class="organizer-img-icon rounded-circle me-3" alt="organizer">
                                @else
                                    <img src="admin_assets/fe/images/frieren.jpeg" class="organizer-img-icon rounded-circle me-3" alt="Default Profile Picture">
                                @endif
                                <h5 class="text-muted">{{ $event->user->name }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Event Section 1 -->

    <hr>

    <!-- Organizer Section -->
<section class="organizer-section">
    <div class="container py-5">
        <div class="section-title">
            <div class="label-title d-flex justify-content-between">
                <h2>Event Organizer</h2>
                <!-- Add a link to view all organizers if needed -->
                <p><a class="link" href="{{ route('event.organizer') }}">Lihat Semua Event Organizer</a></p>

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