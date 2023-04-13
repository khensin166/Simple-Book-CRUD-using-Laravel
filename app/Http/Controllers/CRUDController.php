<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class CRUDController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('index', compact('bukus'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        // Simpan data ke dalam basis data
        $buku = Buku::create($validatedData);

        return redirect()->route('buku.index')->with('success', 'Buku created successfully!');
    }

    public function show($id)
    {
        $buku = Buku::find($id);
        return view('show', compact('buku'));
    }

    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
        ]);

        $buku = Buku::find($id);
        $buku->title = $validatedData['title'];
        $buku->description = $validatedData['description'];
        $buku->status = $validatedData['status'];
        $buku->save();

        return redirect()->route('buku.index')->with('success', 'Buku updated successfully!');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku deleted successfully!');
    }
}
