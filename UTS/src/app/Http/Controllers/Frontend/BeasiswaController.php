<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Beasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function create($id)
    {
        $beasiswa = Beasiswa::findOrFail($id);
        return view('frontend.pendaftaran.form', compact('beasiswa'));
    }

    public function store(Request $request, $id)
    {
        $beasiswa = Beasiswa::findOrFail($id);

        $validated = $request->validate([
            'dokumen.*' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        // Simpan file dokumen
        $dokumen = [];
        foreach ($request->file('dokumen') as $key => $file) {
            $filename = $key . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('dokumen', $filename, 'public');
            $dokumen[$key] = $filename;
        }

        // Cek apakah sudah pernah daftar
        if (Pendaftaran::where('user_id', auth()->id())->where('beasiswa_id', $id)->exists()) {
            return redirect()->back()->with('error', 'Anda sudah mendaftar pada beasiswa ini.');
        }

        // Simpan pendaftaran
        Pendaftaran::create([
            'user_id' => auth()->id(),
            'beasiswa_id' => $id,
            'dokumen' => json_encode($dokumen),
            'status' => 'pending',
        ]);

        return redirect('/dashboard-mahasiswa')->with('success', 'Pendaftaran berhasil dikirim.');
    }
}
