@extends('layouts.user-app')
@section('title', 'Prognet | Detail Event')
@section('contents')
    <!-- Detail Event -->
    <section class="detail-event">
        <div class="container">
            <!--Content Top -->
            <div class="detail-event-content-top">
                <div class="detail-event-content-top-wrapper">
                    <div class="detail-event-breadcrumbs">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="./event.html">Event</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $event->name }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="detail-event-banner">
                        @if ($event->foto)
                            <img src="{{ asset('storage/foto/' . $event->foto) }}" alt="Event Image">
                        @else
                            <!-- If no image, you can display a default image -->
                            <img src="{{ asset('admin_assets/fe/images/event-2.jpeg') }}" alt="Default Event Image">
                        @endif
                    </div>
                    <div class="detail-event-info">
                        <div class="card shadow-sm">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <div class="event-name">
                                    <h3 class="card-title">{{ $event->name }}</h3>
                                </div>
                                <p class="card-text">{{ \Illuminate\Support\Str::limit($event->description, 50, '...') }}
                                </p>
                                <div class="event-info justify-content-center">
                                    <div class="event-date row d-flex align-items-center gx-2">
                                        <div class="col-auto">
                                            <i class="bi bi-calendar-date-fill"></i>
                                        </div>
                                        <div class="col">
                                            <p class="text-muted">{{ $event->date_start . ' s/d ' . $event->date_end }}</p>
                                        </div>
                                    </div>
                                    <div class="event-time row d-flex align-items-center gx-2">
                                        <div class="col-auto">
                                            <i class="bi bi-clock-fill"></i>
                                        </div>
                                        <div class="col">
                                            <p class="text-muted">
                                                {{ $event->time_start . ' s/d ' . $event->time_end . ' WITA' }}</p>
                                        </div>
                                    </div>
                                    <div class="event-location row d-flex align-items-baseline gx-2 mb-3">
                                        <div class="col-auto">
                                            <i class="bi bi-geo-alt-fill"></i>
                                        </div>
                                        <div class="col">
                                            <a href="{{ 'http://maps.google.com/?q=' . $event->location }}" target="_blank">
                                                <p class="text-muted">{{ $event->location }}</p>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-start align-items-center">
                                    @if ($event->user->foto)
                                        <img src="{{ asset('storage/foto/' . $event->user->foto) }}"
                                            class="organizer-img-icon rounded-circle me-3" alt="Profile Pic">
                                    @else
                                        <!-- If no image, you can display a default image -->
                                        <img src="{{ asset('admin_assets/fe/images/frieren.jpeg') }}"
                                            alt="Default Profile Pic">
                                    @endif
                                    <div>
                                        <h7 class="text-muted">Diselenggarakan Oleh</h7>
                                        <h5 class="text-muted">{{ $event->user->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Content Top -->

            <hr>

            <!-- Content Main -->
            <div class="detail-event-content-main">
                <div class="detail-event-content-main-wrapper">
                    <div class="event-detail-description">
                        <div class="detail-title">
                            <div class="label-title d-flex justify-content-between">
                                <h3>Deskripsi</h3>
                            </div>
                        </div>
                        <div class="event-detail-description-content">
                            <p class="event-explanation">
                                {{ $event->description }}
                            </p>
                        </div>
                    </div>
                    <div class="addictional-event-detail d-flex flex-column">
                        <div class="event-detail-ticket">
                            <div class="detail-event-ticket">
                                <div class="card shadow-sm">
                                    <div class="card-body justify-content-between">
                                        <h4 class="card-title">Tiket Tersedia!</h4>
                                        <div class="row align-items-center me-auto">
                                            <div class="col-auto">
                                                <img src="{{ asset('admin_assets/fe/images/ticket.png') }}"
                                                    alt="Ticket Icon" style="height: 2rem;">
                                            </div>
                                            <div class="col">
                                                @if ($event->price > 0)
                                                    <p class="card-text text-muted">Kamu belum beli tiket, nih. Yuk beli
                                                        tiket
                                                        yang
                                                        sudah disediakan!</p>
                                                @else
                                                    <p class="card-text text-muted">Wah, Eventnya gratis nih. Jangan lupa
                                                        datang, ya!</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row harga align-items-center justify-content-between">
                                            <div class="col">
                                                <p class="card-text text-muted">Harga Tiket</p>
                                            </div>
                                            <div class="col">
                                                @if ($event->price > 0)
                                                    <p class="card-text card-price"
                                                        style="text-align: right; display: block;">
                                                        {{ 'Rp. ' . $event->price }}</small></p>
                                                @else
                                                    <p class="card-text card-price"
                                                        style="text-align: right; display: block;">
                                                        Gratis</small></p>
                                                @endif
                                            </div>
                                        </div>
                                        @if ($event->price > 0)
                                            <div class="card-footer">
                                                <form id="buyTicketForm" action="{{ route('beli-tiket', $event->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="quantity">Jumlah Tiket:</label>
                                                        <input type="number" class="form-control" id="quantity"
                                                            name="quantity" min="1" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="totalPrice">Total Harga:</label>
                                                        <input type="text" class="form-control" id="totalPrice"
                                                            name="totalPrice" readonly>
                                                    </div>
                                                    <br>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="calculateTotal()">Hitung Total</button>
                                                        <button type="submit" class="btn btn-success">Beli Tiket</button>
                                                    </div>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="event-category d-flex flex-column">
                            <p class="card-title text-muted">Kategori Event</p>
                            <a href="">{{ $event->category->nama }}</a>
                        </div>
                        <div class="event-share d-flex flex-column">
                            <p class="card-title text-muted">Bagikan Event</p>
                            <div class="share-icons d-flex justify-content-start">
                                <!-- Facebook -->
                                <i class="bi bi-facebook"></i>
                                <!-- Twitter -->
                                <i class="bi bi-twitter"></i>
                                <!-- Whatsapp -->
                                <i class="bi bi-whatsapp"></i>
                                <!-- Instagram -->
                                <i class="bi bi-instagram"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script>
        function calculateTotal() {
            // Fetch quantity from the form
            var quantity = parseInt(document.getElementById('quantity').value);

            // Fetch price per ticket from your backend (replace 'yourPricePerTicket' with the actual variable name)
            var pricePerTicket = {{ $event->price }};

            // Calculate total price
            var totalPrice = quantity * pricePerTicket;

            // Display total price in the form
            document.getElementById('totalPrice').value = "Rp. " + totalPrice.toLocaleString();
        }
    </script>
@endsection
