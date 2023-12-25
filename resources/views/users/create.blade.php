@extends('layouts.app')
@section('title', 'Prognet | Tambah User')
@section('contents')
    <hr />
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
                                id="exampleInputName" placeholder="Name">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Email</label>
                            <input name="email" type="email"
                                class="form-control form-control-user @error('email')is-invalid @enderror"
                                id="exampleInputEmail" placeholder="Email Address">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Password</label>
                            <input name="password" type="password"
                                class="form-control form-control-user @error('password')is-invalid @enderror"
                                id="exampleInputPassword" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Confirm Password</label>
                            <input name="password_confirmation" type="password"
                                class="form-control form-control-user @error('password_confirmation')is-invalid @enderror"
                                id="exampleRepeatPassword" placeholder="Repeat Password">
                            @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Phone</label>
                            <input name="phone_num" type="text"
                                class="form-control form-control-user @error('phone_num')is-invalid @enderror"
                                id="exampleInputPhoneNum" placeholder="Phone Number">
                            @error('phone_num')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Birthdate</label>
                            <input name="birthdate" type="date"
                                class="form-control form-control-user @error('birthdate')is-invalid @enderror"
                                id="exampleInputBirthdate">
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
                                <option value="Admin">Admin</option>
                                <option value="Event">Event</option>
                                <option value="User">User</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Identify Number</label>
                            <input name="identify_number" type="text"
                                class="form-control form-control-user @error('identify_number')is-invalid @enderror"
                                id="exampleInputIdentifyNumber" placeholder="Identify Number">
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
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Mental Illness">Mental Illness</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label class="labels">Profile Photo</label>
                            <input name="foto" type="file" class="form-control-file" id="fotoInput"
                                onchange="previewImage()">
                            <img id="fotoPreview" class="img-fluid mt-2" alt="Preview" style="display: none;">
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
                                    preview.style.display = 'block';
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                    <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button"
                            type="submit">Tambah User</button></div>
                </div>
            </div>
        </div>
    </form>

@endsection
