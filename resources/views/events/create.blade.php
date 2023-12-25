@extends('layouts.app')

@section('title', 'Buat Festival')

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


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Date picker for start date
            var startDatePicker = new Pikaday({
                field: document.getElementById('exampleInputDateStart'),
                format: 'YYYY-MM-DD',
                minDate: new Date(),
                yearRange: [1900, moment().year()],
                showYearDropdown: true,
                placeholder: 'Tanggal Mulai'
            });

            // Date picker for end date
            var endDatePicker = new Pikaday({
                field: document.getElementById('exampleInputDateEnd'),
                format: 'YYYY-MM-DD',
                minDate: new Date(),
                yearRange: [1900, moment().year()],
                showYearDropdown: true,
                placeholder: 'Tanggal Selesai'
            });

            flatpickr('.flatpickr-time', {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            });
        });
    </script>

    <!-- ... referensi lainnya ... -->
</head>

@section('contents')
<h1 class="mb-0"> </h1>
    <hr />
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Nama" autocomplete="off">
        </div>
        <div class="col">
                <select name="category_id" class="form-control" autocomplete="off">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="date_start" class="form-control form-control-user datepicker" placeholder="Tanggal Mulai" id="exampleInputDateStart" autocomplete="off">
        </div>
        <div class="col">
            <input type="text" name="date_end" class="form-control form-control-user datepicker" placeholder="Tanggal Selesai" id="exampleInputDateEnd" autocomplete="off">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="time_start" class="form-control flatpickr-time" placeholder="Jam Mulai" id="exampleInputTimeStart" autocomplete="off">
        </div>
        <div class="col">
            <input type="text" name="time_end" class="form-control flatpickr-time" placeholder="Jam Selesai" id="exampleInputTimeEnd" autocomplete="off">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="location" class="form-control" placeholder="Lokasi" autocomplete="off">
        </div>
        <div class="col">
            <input type="text" name="price" class="form-control" placeholder="Harga" autocomplete="off">
        </div>
    </div>
    <div class="row mb-3">
    <div class="col">
            <textarea class="form-control" name="description" placeholder="Deskripsi"></textarea>
        </div>
   
   
        <div class="form-group">
            <label class="labels">Event Photo</label>
            <input name="foto" type="file" class="form-control-file" id="fotoInput"
                onchange="previewImage()">
            <img id="fotoPreview" class="img-fluid mt-2" alt="Preview" style="display: none;">
        </div>
        <script>
            function previewImage() {
                const input = document.getElementById('fotoInput');
                const preview = document.getElementById('fotoPreview');
    
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
    
                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };
    
                    reader.readAsDataURL(input.files[0]);
                }
            }
        </script>
    <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</form>

@endsection
