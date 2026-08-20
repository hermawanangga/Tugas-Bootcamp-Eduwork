<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource (admin management table).
     */
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
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
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()
            ->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus!');
    }
}
