<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {

        $users = User::orderBy('id', 'ASC')->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone_num' => 'required|unique:users',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'identify_number' => 'required|unique:users',
            'role' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('users.create')
                ->withErrors($validator)
                ->withInput();

        }
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $namaFoto = $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $namaFoto);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_num' => $request->phone_num,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'identify_number' => $request->identify_number,
            'foto' => $namaFoto,
            'role' => $request->role,
            'remember_token' => Str::random(60),          
        ]);
        return redirect()->route('users.index')->with('success', 'User added successfully');
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }
}
