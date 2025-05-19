@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Dashboard Mahasiswa</h1>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Kartu Statistik --}}
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <i class="align-middle text-primary" data-feather="book"></i>
                    </div>
                    <div>
                        <h5 class="card-title">Total Beasiswa Aktif</h5>
                        <h3 class="mb-0">{{ $totalBeasiswa }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Beasiswa --}}
    <div class="row">
        @foreach ($beasiswas as $beasiswa)
        <div class="col-md-6 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <strong>{{ $beasiswa->nama }}</strong>
                </div>
                <div class="card-body">
                    <p>{{ $beasiswa->deskripsi }}</p>
                    <p><strong>Jenis:</strong> {{ ucfirst($beasiswa->jenis) }}</p>
                    <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($beasiswa->deadline)->format('d M Y') }}</p>

                    @php
                        $pendaftaran = $beasiswa->pendaftarans->where('user_id', auth()->id())->first();
                    @endphp

                    @if ($pendaftaran)
                        <span class="badge bg-secondary">Status: {{ ucfirst($pendaftaran->status) }}</span>
                    @else
                        <a href="{{ route('daftar.beasiswa', $beasiswa->id) }}" class="btn btn-sm btn-success">Daftar</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
