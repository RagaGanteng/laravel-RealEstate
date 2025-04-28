<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index', compact('categories'))
        ->with('i', (request()->input('page', 1) - 1) * 10);// Kembalikan sebagai JSON (untuk API)
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Biasanya, ini untuk menampilkan form di view, tapi untuk API, tidak diperlukan
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ // Validasi input
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($request->only('name', 'description')); // Buat kategori baru
        return response()->json($category, 201); // Kembalikan kategori yang baru dibuat
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id); // Ambil kategori berdasarkan ID
        return response()->json($category); // Kembalikan kategori sebagai JSON
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Biasanya, untuk API tidak perlu, tapi bisa digunakan untuk UI (view)
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([ // Validasi input
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id); // Ambil kategori berdasarkan ID
        $category->update($request->only('name', 'description')); // Update kategori
        return response()->json($category); // Kembalikan kategori yang telah diupdate
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id); // Ambil kategori berdasarkan ID
        $category->delete(); // Hapus kategori
        return response()->json(null, 204); // Kembalikan response status 204 (No Content)
    }
}
