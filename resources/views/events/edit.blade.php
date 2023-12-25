@extends('layouts.app')
@section('title', 'Edit Festival')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/css/pikaday.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.8.0/pikaday.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var startDatePicker = new Pikaday({
                field: document.getElementById('exampleInputDateStart'),
                format: 'YYYY-MM-DD',
                minate: new Date(),
                yearRange: [1900, moment().year()],
                showYearDropdown: true,
                placeholder: 'Tanggal Mulai'
            });
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
</head>
@section('contents')
    <hr />
    <form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $event->name }}"
                    autocomplete="off">
            </div>
            <div class="col">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-control" value="{{ $event->category->name }}" autocomplete="off">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Date Start</label>
                <input type="text" name="date_start" class="form-control form-control-user datepicker"
                    placeholder="Tanggal Mulai" id="exampleInputDateStart" value="{{ $event->date_start }}"
                    autocomplete="off">
            </div>
            <div class="col mb-3">
                <label class="form-label">Date End</label>
                <input type="text" name="date_end" class="form-control form-control-user datepicker"
                    placeholder="Tanggal Selesai" id="exampleInputDateEnd" value="{{ $event->date_end }}"
                    autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Time Start</label>
                <input type="text" name="time_start" class="form-control flatpickr-time" placeholder="Jam Mulai"
                    id="exampleInputTimeStart" value="{{ $event->time_start }}" autocomplete="off">
            </div>
            <div class="col mb-3">
                <label class="form-label">Time End</label>
                <input type="text" name="time_end" class="form-control flatpickr-time" placeholder="Jam Selesai"
                    id="exampleInputTimeEnd" value="{{ $event->time_end }}" autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" placeholder="Location"
                    value="{{ $event->location }}" autocomplete="off">
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $event->price }}"
                    autocomplete="off">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <input type="text" class="form-control" name="description" placeholder="Descriptoin" value="{{ $event->description }}"></input>
            </div>
        </div>
        <div class="form-group">
            <label class="labels">Profile Photo</label>
            <input name="foto" type="file" class="form-control-file" id="fotoInput" onchange="previewImage()">
            <img id="fotoPreview" class="img-fluid mt-2" alt="Preview" style="display: none;">
        </div>
        
        @if ($event->foto)
            <div class="mb-3">
                <label class="labels">Existing Profile Photo</label>
                <img src="{{ asset('storage/foto/' . $event->foto) }}" alt="Existing Profile Picture" class="img-fluid">
            </div>
        @endif
        
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
                <button class="btn btn-warning">Update</button>
                <button type="button" onclick="window.location.href = '/events/events'" class="btn btn-danger">Back</button>
            </div>
        </div>
        </form>
        
   
    
        
@endsection
