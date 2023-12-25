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

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone_num' => 'required',
            'birthdate' => 'required|date',
            'identify_number' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required',
        ])->validate();
        $dataToUpdate = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_num' => $request->input('phone_num'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'identify_number' => $request->input('identify_number'),
            'role' => $request->input('role'),
            'remember_token' => Str::random(60),
        ];
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $namaFoto = $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $namaFoto);
            $dataToUpdate['foto'] = $namaFoto;
        }
        try {
            // Menemukan event berdasarkan ID
            $user = User::findOrFail($id);

            // Melakukan update data
            $user->update($dataToUpdate);

            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('users.index')->with('error', 'User not found');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Error updating users');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
