@extends('layouts.user-app')
@section('title', 'Prognet | Edit Profile')
@section('contents')
    <hr />
    <section class="edit-profile" style="padding-right: 5rem; padding-left: 5rem;">
        <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="{{ route('profile.update') }}">
            @csrf
            <div class="row">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5" style="margin-top: 60px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row" id="res"></div>
                        <div class="form-group">
                            <label class="labels">Profile Photo</label>
                                <div class="d-flex">
                                    @if (auth()->user()->foto)
                            <img src="{{ asset('storage/foto/' . auth()->user()->foto) }}" alt="Profile Picture"
                                style="max-width: 200px; max-height: 200px;" class="rounded-circle">
                        @endif
                        <br>
                        <img id="fotoPreview" class="img-fluid mt-2 rounded-circle" alt="Preview" style="display: none;" >
                                </div>
                                <input name="foto" type="file" class="form-control-file" id="fotoInput"
                                onchange="previewImage()">
                            
                        </div>
                        <div class="row mt-2">

                            <div class="col-md-6">
                                <label class="labels">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="first name"
                                    value="{{ auth()->user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Email</label>
                                <input type="text" name="email" class="form-control"
                                    value="{{ auth()->user()->email }}" placeholder="Email"readonly>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Phone</label>
                                <input type="text" name="phone_num" class="form-control" placeholder="Phone Number"
                                    value="{{ auth()->user()->phone_num }}">
                            </div>
                            <div class="col-md-6">
                                <label class="labels">Birthdate</label>
                                <input type="date" name="birthdate" class="form-control"
                                    value="{{ auth()->user()->birthdate }}" placeholder="Birthdate">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="Male" {{ auth()->user()->gender === 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ auth()->user()->gender === 'Female' ? 'selected' : '' }}>
                                        Female
                                    </option>
                                    <option value="Mental Illness"
                                        {{ auth()->user()->gender === 'Mental Illness' ? 'selected' : '' }}>Mental Illness
                                    </option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                        <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                                type="submit">Save Profile</button></div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <script>
        function previewImage() {
            const input = document.getElementById('fotoInput');
            const preview = document.getElementById('fotoPreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style = 'display:block; max-width: 200px; max-height: 300px;';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
