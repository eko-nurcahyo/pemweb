@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Profil Mahasiswa</h3>

    <div class="card">
        <div class="card-body">
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p><strong>NIM:</strong> {{ auth()->user()->nim }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

            {{-- Tambahan opsional --}}
            @if (auth()->user()->jurusan)
                <p><strong>Jurusan:</strong> {{ auth()->user()->jurusan }}</p>
            @endif

            @if (auth()->user()->fakultas)
                <p><strong>Fakultas:</strong> {{ auth()->user()->fakultas }}</p>
            @endif

            @if (auth()->user()->no_hp)
                <p><strong>No. HP:</strong> {{ auth()->user()->no_hp }}</p>
            @endif
        </div>
    </div>
</div>
@endsection
