<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AgendaController extends Controller
{
    // Public: daftar agenda
    public function index()
    {
        $agendas = Agenda::orderBy('start_date', 'asc')->paginate(10);
        return view('agenda.index', compact('agendas'));
    }

    // Admin: list
    public function adminIndex()
    {
        $agendas = Agenda::orderBy('start_date', 'desc')->paginate(15);
        return view('admin.agenda.index', compact('agendas'));
    }

    // Admin: form create
    public function create()
    {
        return view('admin.agenda.create');
    }

    // Admin: simpan
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'nullable|string|max:255',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('agenda', 'public');
        }

        Agenda::create($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dibuat.');
    }

    // Admin: form edit
    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.edit', compact('agenda'));
    }

    // Admin: update
    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'location'    => 'nullable|string|max:255',
            'start_date'  => 'nullable|date',
            'end_date'    => 'nullable|date|after_or_equal:start_date',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($request->hasFile('image')) {
            // optional: hapus file lama
            if ($agenda->image && Storage::disk('public')->exists($agenda->image)) {
                Storage::disk('public')->delete($agenda->image);
            }
            $data['image'] = $request->file('image')->store('agenda', 'public');
        }

        $agenda->update($data);

        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil diperbarui.');
    }

    // Admin: hapus
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agenda.index')->with('success', 'Agenda berhasil dihapus.');
    }
}
