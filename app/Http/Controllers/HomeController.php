<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $bukus = Buku::all(); // ambil semua data dari model buku
        return view('index', compact('bukus'));
    }

    public function create()
    {
        return view('create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Simpan data ke dalam basis data
        $buku = Buku::create($validatedData);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('index')->with('success', 'Recipe created successfully!');
    }

    public function edit($id)
    {
        $buku = Buku::find($id); // Ambil data buku berdasarkan ID
        return view('edit', compact('buku')); // Kirim data buku ke view edit.blade.php
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $buku = Buku::find($id); // Ambil data buku berdasarkan ID
        $buku->title = $validatedData['title'];
        $buku->description = $validatedData['description'];
        $buku->status = $validatedData['status'];
        $buku->save(); // Simpan data buku yang telah diupdate

        return redirect()->route('index')->with('success', 'Buku updated successfully!'); // Redirect ke halaman lain atau tampilkan pesan sukses
    }

    public function destroy($id)
    {
        $buku = Buku::find($id); // Ambil data buku berdasarkan ID
        $buku->delete(); // Hapus data buku

        return redirect()->route('index')->with('success', 'Buku deleted successfully!'); // Redirect ke halaman lain atau tampilkan pesan sukses
    }
}
