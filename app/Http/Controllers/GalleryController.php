<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    // 🔹 Halaman publik (user)
    public function index(Request $request)
    {
        $query = Gallery::query();

        // Filter kategori
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Pencarian judul
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $galleries = $query->latest()->paginate(12);

        // Ambil kategori unik dengan cache
        $categories = cache()->remember('gallery_categories', 300, function () {
            return Gallery::select('category')
                ->distinct()
                ->whereNotNull('category')
                ->where('category', '!=', '')
                ->pluck('category');
        });

        // Blade yang ada: resources/views/gallery/index.blade.php
        return view('gallery.index', compact('galleries', 'categories'));
    }

    public function show(Gallery $gallery)
    {
        // Blade yang ada: resources/views/gallery/show.blade.php
        return view('gallery.show', compact('gallery'));
    }

    // 🔹 Halaman admin
    public function adminIndex()
    {
        $galleries = Gallery::all();
        return view('admin.gallery.index', compact('galleries'));
    }


    public function create()
    {
        // Blade yang ada: resources/views/admin/gallery/create.blade.php
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ], [
            'title.required' => 'Judul wajib diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'image.required' => 'Gambar wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
            'image.max' => 'Ukuran gambar maksimal 10MB',
        ]);

        try {
            $imagePath = $request->file('image')->store('uploads', 'public');

            Gallery::create([
                'title' => $request->title,
                'category' => $request->category,
                'description' => $request->description,
                'image' => $imagePath,
            ]);

            return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan foto: ' . $e->getMessage());
        }
    }

    public function edit(Gallery $gallery)
    {
        // Blade yang ada: resources/views/admin/gallery/edit.blade.php
        return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->only(['title', 'category', 'description']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('uploads', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil diupdate');
    }

    public function destroy(Gallery $gallery)
    {
        // Hapus file gambar dari storage
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus!');
    }

    public function getCategories()
    {
        $categories = Gallery::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->pluck('category')
            ->toArray();
        
        return response()->json($categories);
    }

    public function download(Gallery $gallery)
    {
        $path = storage_path('app/public/' . $gallery->image);
        if (!file_exists($path)) {
            abort(404);
        }

        $filename = Str::slug($gallery->title ?? 'foto-galeri') . '.' . pathinfo($path, PATHINFO_EXTENSION);
        return response()->download($path, $filename);
    }
}
