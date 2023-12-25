<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
class KategoriController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Pengecekan apakah pengguna telah login
        if ($user) {
            $kategori = Category::all();

            return view('kategori.index', compact('kategori'));
        } else {
            // Logika ketika pengguna tidak terotentikasi
            return redirect()->route('AdminDashboard')->with('error', 'You need to login to view events.');
        }
    }
    public function create()
    {
        $kategori = Category::all();
        return view('kategori.create', compact('kategori'));
    }


    public function store(Request $request)
    {
        $id = Auth::id();

        $kategori = Category::create([
            'id' => $id,
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi')
        ]);
        Alert::success('Create Success', 'Congratulation! ');
        return redirect()->route('kategori.index', compact('kategori'))->with('success', 'Categories added successfully');
    }


    public function show($id)
    {
        $kategori = Category::findOrFail($id);
        
        return view('kategori.show', compact('kategori'));
    }
    


    public function edit($id)
    {
        $kategori = Category::findOrFail($id);
       
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
{
    // Validasi data
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
    ]);

    try {
        // Menemukan event berdasarkan ID
        $kategori = Category::findOrFail($id);

        // Melakukan update data
        $kategori->update($request->all());
        
  Alert::success('Create Success');
        return redirect()->route('kategori.index')->with('success', 'Kategori updated successfully');
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return redirect()->route('kategori.index')->with('error', 'Kategori not found');
    } catch (\Exception $e) {
        return redirect()->route('kategori.index')->with('error', 'Error updating event');
    }
}

    


  

public function destroy($id)
{
    $kategori = Category::findOrFail($id);

    $kategori->delete();
    Alert::success('Delete Success');
    return redirect()->route('kategori.index')->with('success', 'kategori deleted successfully');
}
}
