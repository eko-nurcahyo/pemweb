<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Beasiswa;

class DashboardMahasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = Beasiswa::where('aktif', true)
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_selesai', '>=', now())
            ->get();

        $totalBeasiswa = $beasiswas->count();

        return view('frontend.dashboard', compact('beasiswas', 'totalBeasiswa'));
    }
}
