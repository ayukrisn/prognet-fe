@extends('layouts.user-app')
@section('title', 'Prognet | Home')
@section('contents')

<!-- Event Section 1 -->
<section class="event-section">
    <div class="container py-5">
        <div class="section-title">
            <div class="label-title d-flex justify-content-between">
                <h2>Event Pilihan</h2>
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
   
@endsection