@extends('layouts.app')

@section('title', 'Jelajahi Event yang Tersedia')

@section('contents')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    @if ($event->count() > 0)
        @foreach ($event as $rs)
            <div class="row">
                <div class="col-lg-12">
                    <!-- Basic Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="m-0 font-weight-bold text-primary">{{ $rs->name }}</h6>
                                <div class="d-flex">
                                    <p class="m-0 font-weight-bold text-primary" style="font-size: 12px;">
                                        {{ $rs->category->nama }}</p>
                                    <span class="mx-2"></span>
                                    <p class="m-0 font-weight-bold text-primary" style="font-size: 12px;">
                                        {{ $rs->location }}</p>
                                    <span class="mx-2"></span>
                                    <p class="m-0 font-weight-bold text-primary" style="font-size: 12px;">Rp:
                                        {{ $rs->price }}</p>
                                </div>
                            </div>

                            <div>
                                <p class="m-0 font-weight-bold text-primary" style="font-size: 12px;">Mulai:
                                    {{ $rs->time_start }}/{{ $rs->date_start }}</p>
                                <p class="m-0 font-weight-bold text-primary" style="font-size: 12px;">Selesai:
                                    {{ $rs->time_end }}/{{ $rs->date_end }}</p>
                            </div>
                        </div>
                        @if ($rs->foto)
                            <img src="{{ asset('storage/foto/' . $rs->foto) }}" class="card-img-top" style="max-height:400px;" alt="Event Image">
                        @else
                            <!-- If no image, you can display a default image -->
                            <img src="admin_assets/fe/images/event-1.jpeg" class="card-img-top" alt="Default Event Image">
                        @endif
                        <div class="card-body">
                            <?php
                            $maxWords = 40;
                            $words = str_word_count($rs->description, 1);
                            
                            if (count($words) > $maxWords) {
                                $truncatedDescription = implode(' ', array_slice($words, 0, $maxWords)) . '...';
                            } else {
                                $truncatedDescription = $rs->description;
                            }
                            ?>
                            <p>{{ $truncatedDescription }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('events.show', ['id' => $rs->id]) }}" class="btn btn-primary btn-block">Lihat Detail Event</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <tr>
            <td class="text-center" colspan="5">Tidak Ada Festival</td>
        </tr>
    @endif
@endsection
