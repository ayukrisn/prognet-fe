@extends('layouts.app')

@section('title', 'Detail User')

@section('contents')

    <hr />
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-1">
                <div class="row" id="res"></div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="first name"
                            value="{{ $user->name }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}"
                            placeholder="Email" readonly>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Phone</label>
                        <input type="text" name="phone_num" class="form-control" placeholder="Phone Number"
                            value="{{ $user->phone_num }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Birthdate</label>
                        <input type="date" name="birthdate" class="form-control" value="{{ $user->birthdate }}"
                            placeholder="Birthdate" readonly>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Role</label>
                        <input type="text" name="role" class="form-control" placeholder="Role"
                            value="{{ $user->role }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Identify Number</label>
                        <input type="text" name="identify_number" class="form-control" placeholder="Identify Number"
                            value="{{ $user->identify_number }}" readonly>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Gender</label>
                        <select name="gender" class="form-control" disabled>
                            <option value="Male" {{ $user->gender === 'Male' ? 'selected' : '' }}>Male
                            </option>
                            <option value="Female" {{ $user->gender === 'Female' ? 'selected' : '' }}>Female
                            </option>
                            <option value="Mental Illness" {{ $user->gender === 'Mental Illness' ? 'selected' : '' }}>Mental
                                Illness
                            </option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        @if ($user->foto)
                            <div class="row mt-2">
                                <div class="col">
                                    <label class="labels">Profile Picture</label>
                                    <img src="{{ asset('storage/foto/' . $user->foto) }}" class="rounded-circle"
                                        alt="Profile Picture"
                                        style="max-width: 200px; max-height: 300px; display: block; margin-top: 8px;">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
