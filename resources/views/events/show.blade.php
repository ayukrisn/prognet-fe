@extends('layouts.app')

@section('title', 'Detail Festival')

@section('contents')
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $event->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Category"
                value="{{ $event->category->nama }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ $event->location }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Date Start</label>
            <input type="text" name="date_start" class="form-control" placeholder="Date Start"
                value="{{ $event->date_start }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Date End</label>
            <input type="text" name="date_end" class="form-control" placeholder="Date End" value="{{ $event->date_end }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Time Start</label>
            <input type="text" name="time_start" class="form-control" placeholder="Time Start"
                value="{{ $event->time_start }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Time End</label>
            <input type="text" name="time_end" class="form-control" placeholder="Time End" value="{{ $event->time_end }}"
                readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea class="form-control" name="description" placeholder="Description" readonly>{{ $event->description }}</textarea>
        </div>
    </div>
<br>
<br>
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
    <div class="col mb-3" style="text-align: center;">
        <img src="{{ asset('storage/foto/' . $event->foto) }}" alt="Profile Picture"
            style="max-width: 1000px; max-height: 1000px; margin: auto;">
    </div>
    
    
    

    <div class="form-group row">
        <div class="col-sm-10">
            <button type="button" onclick="window.location.href = '/events/events'" class="btn btn-danger">Back</button>
        </div>
    </div>


@endsection
