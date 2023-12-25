@extends('layouts.app')
  
@section('title', 'Edit Festival')
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
    <hr />
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ $kategori->nama }}" autocomplete="off">
            </div>
           
    
            <div class="col mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" name="deskripsi"  class="form-control" placeholder="Deskripsi"  value="{{ $kategori->deskripsi }}" autocomplete="off">
            </div>
        
        </div>
        <br>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
                <button type="button" onclick="window.location.href = '/kategori/kategori'"
                    class="btn btn-danger">Back</button>
            </div>
        </div>
    </form>
    
@endsection