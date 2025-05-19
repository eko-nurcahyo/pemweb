@extends('frontend.layouts.app')

@section('content')
<div class="container py-4">
    <h2>Form Pendaftaran Beasiswa</h2>

    <div class="card">
        <div class="card-body">
            <h5>{{ $beasiswa->nama }}</h5>
            <p>{{ $beasiswa->deskripsi }}</p>
            <p><strong>Jenis:</strong> {{ $beasiswa->jenis }}</p>
            <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($beasiswa->deadline)->format('d M Y') }}</p>
            {{-- Form pendaftaran bisa ditambahkan di sini --}}
        </div>
    </div>
</div>
@endsection
