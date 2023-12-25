@extends('layouts.app')
@section('title', 'Prognet | Edit User')
@section('contents')
    <hr />
    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12 border-right">
                <div class="p-3 py-1">
                    <div class="row" id="res"></div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input name="name" type="text"
                                class="form-control form-control-user @error('name')is-invalid @enderror"
                                id="exampleInputName" placeholder="Name" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input name="email" type="email"
                                class="form-control form-control-user @error('email')is-invalid @enderror"
                                id="exampleInputEmail" placeholder="Email Address" value="{{ $user->email }}" readonly>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input name="phone_num" type="text"
                                class="form-control form-control-user @error('phone_num')is-invalid @enderror"
                                id="exampleInputPhoneNum" placeholder="Phone Number" value="{{ $user->phone_num }}">
                            @error('phone_num')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Birthdate</label>
                            <input name="birthdate" type="date"
                                class="form-control form-control-user @error('birthdate')is-invalid @enderror"
                                id="exampleInputBirthdate" value="{{ $user->birthdate }}">
                            @error('birthdate')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Role</label>
                            <select name="role" id="role"
                                class="form-control form-control-user @error('role') is-invalid @enderror">
                                <option value="" disabled selected>Select Role</option>
                                <option value="Admin" {{ $user->role === 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Event" {{ $user->role === 'Event' ? 'selected' : '' }}>Event</option>
                                <option value="User" {{ $user->role === 'User' ? 'selected' : '' }}>User</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Identify Number</label>
                            <input name="identify_number" type="text"
                                class="form-control form-control-user @error('identify_number')is-invalid @enderror"
                                id="exampleInputIdentifyNumber" placeholder="Identify Number"
                                value="{{ $user->identify_number }}">
                            @error('identify_number')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Gender</label>
                            <select name="gender" id="gender"
                                class="form-control form-control-user @error('gender') is-invalid @enderror">
                                <option value="" disabled selected>Select Gender</option>
                                <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Mental Illness" {{ $user->gender === 'Mental Illness' ? 'selected' : '' }}>
                                    Mental Illness</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="labels">Profile Photo</label>
                            <input name="foto" type="file" class="form-control-file" id="fotoInput"
                                onchange="previewImage()">
                                <div class="d-flex">
                                    <img id="fotoPreview" class="img-fluid mt-2 rounded-circle" alt="Preview" style="display: none;">
                                    <br>
                                    @if ($user->foto)
                                        <img src="{{ asset('storage/foto/' . $user->foto) }}" class="rounded-circle"
                                            alt="Profile Picture" style="max-width: 200px; max-height: 300px;">
                                    @endif
                                </div>
                        </div>
                    </div>

                    <script>
                        function previewImage() {
                            const input = document.getElementById('fotoInput');
                            const preview = document.getElementById('fotoPreview');

                            if (input.files && input.files[0]) {
                                const reader = new FileReader();

                                reader.onload = function(e) {
                                    preview.src = e.target.result;
                                    preview.style = 'display=block; max-width: 200px; max-height: 300px;';
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>

                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                            type="submit">Simpan Edit</button></div>
                </div>
            </div>
        </div>
    </form>

@endsection
