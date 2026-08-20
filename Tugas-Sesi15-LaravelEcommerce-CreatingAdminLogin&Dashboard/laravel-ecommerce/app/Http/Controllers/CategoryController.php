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
        $categories = Category::withCount('products')->get();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->file('gambar'));
        $request->validate([
            'nama_kategori' => 'required|max:255',
            'gambar'        => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $gambar = null;

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('categories', 'public');
        }
        Category::create([
            'nama_kategori' => $request->nama_kategori,
            'gambar'        => $gambar,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $products = $category->products()->latest()->paginate(12);

        return view('categories.show', compact('category', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required|max:255',
            'gambar'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $gambar = $category->gambar;

        if ($request->hasFile('gambar')) {

            // hapus gambar lama
            if ($category->gambar && \Illuminate\Support\Facades\Storage::disk('public')->exists($category->gambar)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($category->gambar);
            }

            // simpan gambar baru
            $gambar = $request->file('gambar')->store('categories', 'public');
        }

        $category->update([
            'nama_kategori' => $request->nama_kategori,
            'gambar'        => $gambar,
        ]);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
