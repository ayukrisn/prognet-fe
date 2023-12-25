<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;

class EventController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pengecekan apakah pengguna telah login
        if ($user->role == "Event" || $user->role == "Admin") {
            $event = Event::with('category')->where('user_id', $user->id)->get();
            return view('events.index', compact('event'));
        } else {
            // Logika ketika pengguna tidak terotentikasi
            return redirect()->route('AdminDashboard')->with('error', 'You need to login to view events.');
        }
    }
    public function create()
    {
        $categories = Category::all();
        return view('events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        
        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Sesuaikan dengan kebutuhan
            // tambahkan validasi sesuai kebutuhan
        ]);
    
        $event = [
            'user_id' => $userId,
            'name' => $request->input('name'),
            'category_id' => $request->input('category_id'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'time_start' => $request->input('time_start'),
            'time_end' => $request->input('time_end'),
            'price' => $request->input('price'),
        ];
        
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            $foto = $request->file('foto');
            $namaFoto = $foto->getClientOriginalName();
            $foto->storeAs('public/foto', $namaFoto);
            $event['foto'] = $namaFoto;
        }
        
        $event = Event::create($event);
        
    
        return redirect()->route('events.index', compact('event'))->with('success', 'Event added successfully');
    }


    public function show($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();

        return view('events.show', compact('event', 'categories'));
    }


    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();

        return view('events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'name' => 'required',
        'category_id' => 'required',
        'date_start' => 'required|date',
        'date_end' => 'required|date|after_or_equal:date_start',
        'time_start' => 'required',
        'time_end' => 'required',
        'location' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        // tambahkan validasi sesuai kebutuhan
    ]);

    try {
        // Menemukan event berdasarkan ID
        $event = Event::findOrFail($id);

        // Melakukan update data
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->route('events.index')->with('error', 'Event not found');
    } catch (\Exception $e) {
        return redirect()->route('events.index')->with('error', 'Error updating event');
    }
}

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    

}
