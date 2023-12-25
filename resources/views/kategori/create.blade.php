@extends('layouts.app')

@section('title', 'Buat Kategori')

<head>
    <!-- ... referensi lainnya ... -->

    <!-- Pikaday -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>

    <!-- Masukkan Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Masukkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Masukkan Flatpickr script -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


</head>

@section('contents')
<h1 class="mb-0"> </h1>
    <hr />
    <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
  
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="nama" class="form-control" placeholder="Nama" autocomplete="off">
        </div>
        <div class="col">
            <input type="text" name="deskripsi" class="form-control" placeholder="Deskripsi"  autocomplete="off">
        </div>
    </div>
   
    <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>

@endsection
