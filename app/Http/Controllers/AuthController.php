<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Middleware\role;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Event;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
    public function registerSave(Request $request)
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
            return redirect('register')
                ->withErrors($validator)
                ->withInput();
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_num' => $request->phone_num,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'identify_number' => $request->identify_number,
            'role' => $request->role,
            'remember_token' => Str::random(60),
           
        ]);
        Alert::success('Registration Success', 'Congratulation! You have successfully registered.');

        return redirect()->route('login');
    }
    public function login()
    {
        return view('auth/login');
    }
    public function about()
    {
        return view('auth/about');
    }
    public function loginAction(Request $request)
{
    Validator::make($request->all(), [
        'email' => 'required|email',
        'password' => 'required',
    ])->validate();

    if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    $user = Auth::user();

    // Cek peran pengguna dan atur rute redirect berdasarkan peran
    $allowedRoles = ['Admin', 'Event', 'User'];

    // Langsung redirect tanpa melalui middleware
    return $this->redirectToDashboard($user, $allowedRoles);
}
private function redirectToDashboard($user, $allowedRoles)
{
    if (in_array($user->role, $allowedRoles)) {
        return redirect()->route($user->role . 'Dashboard');
    }

    return redirect()->route('login');
}


    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/login');
    }
    public function profileAdmin()
    {
        return view('profileAdmin');
    }
    public function AdminDashboard()
    {
        return view('AdminDashboard');
    }
    public function updateProfileAdmin(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone_num' => 'required',
            'birthdate' => 'required|date',
            'identify_number' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ])->validate();
        $dataToUpdate = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_num' => $request->input('phone_num'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'identify_number' => $request->input('identify_number'),
            'remember_token' => Str::random(60),  
        ];
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $namaFoto = $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $namaFoto);
            $dataToUpdate['foto'] = $namaFoto;
        }
        User::where('id', auth()->user()->id)->update($dataToUpdate);
        Alert::success('Update Success', 'Congratulation! You have successfully Updated Your Account.');

        return redirect()->route('profileAdmin')->with('success', 'Profile updated successfully!');
    }
    public function profileUser()
    {
        return view('profile');
    }
    public function UserDashboard()
    {
    $users = User::where('role', 'Event')->limit(4)->get();
    $kategori = Category::limit(8)->get();
    $events = Event::with('user')->limit(8)->get();

    return view('UserDashboard', compact('kategori', 'events', 'users'));
    }

    public function updateProfileUser(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone_num' => 'required',
            'birthdate' => 'required|date',
            'identify_number' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ])->validate();
        $dataToUpdate = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_num' => $request->input('phone_num'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'identify_number' => $request->input('identify_number'),
            'remember_token' => Str::random(60),  
        ];
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $namaFoto = $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $namaFoto);
            $dataToUpdate['foto'] = $namaFoto;
        }
        User::where('id', auth()->user()->id)->update($dataToUpdate);
        Alert::success('Update Success', 'Congratulation! You have successfully Updated Your Account.');

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
    public function profileEvent()
    {
        return view('profileEvent');
    }
    public function EventDashboard()
    {
        return view('EventDashboard');
    }
    public function updateProfileEvent(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'phone_num' => 'required',
            'birthdate' => 'required|date',
            'identify_number' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ])->validate();
        $dataToUpdate = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_num' => $request->input('phone_num'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'identify_number' => $request->input('identify_number'),
            'remember_token' => Str::random(60),  
        ];
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $namaFoto = $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $namaFoto);
            $dataToUpdate['foto'] = $namaFoto;
        }
        User::where('id', auth()->user()->id)->update($dataToUpdate);
        Alert::success('Update Success', 'Congratulation! You have successfully Updated Your Account.');

        return redirect()->route('profileEvent')->with('success', 'Profile updated successfully!');
    }

    public function showUserDetails($id)
    {
    $event = Event::findOrFail($id);

    if (Auth::user()->role != 'User') {
        return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
    }

    return view('EventDetails', compact('event'));
    }
}
