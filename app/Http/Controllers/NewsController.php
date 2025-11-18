<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Admin: list berita
    public function adminIndex()
    {
        $news = News::latest()->paginate(12);
        return view('admin.news.index', compact('news'));
    }

    // Admin: form tambah
    public function create()
    {
        return view('admin.news.create');
    }

    // Admin: simpan berita
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'nullable|string|max:255',
            'excerpt'      => 'nullable|string|max:500',
            'content'      => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dibuat.');
    }

    // Admin: form edit
    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    // Admin: update berita
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'category'     => 'nullable|string|max:255',
            'excerpt'      => 'nullable|string|max:500',
            'content'      => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'published_at' => 'nullable|date',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    // Admin: hapus berita
    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }

    // Public: daftar berita
    public function publicIndex()
    {
        $news = News::latest()->paginate(9);
        return view('news.index', compact('news'));
    }

    // Public: detail berita
    public function publicShow(News $news)
    {
        return view('news.show', compact('news'));
    }
}
