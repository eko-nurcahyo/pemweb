<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function dashboard()
    {
        $beasiswas = Beasiswa::with('pendaftarans')->where('aktif', true)
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->get();

        $totalBeasiswa = $beasiswas->count();

        return view('frontend.dashboard', compact('beasiswas', 'totalBeasiswa'));
    }

    public function formPendaftaran($id)    
    {
        $beasiswa = \App\Models\Beasiswa::findOrFail($id);

        return view('frontend.pendaftaran', compact('beasiswa'));
    }

}
