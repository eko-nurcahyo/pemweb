@extends('frontend.layouts.app')

@section('content')
<div class="container">
    <h3>Form Pendaftaran: {{ $beasiswa->nama }}</h3>

    <form method="POST" action="{{ route('daftar.beasiswa.store', $beasiswa->id) }}" enctype="multipart/form-data">
        @csrf

        @foreach(json_decode($beasiswa->dokumen_wajib) as $dok)
            <div class="mb-3">
                <label>{{ $dok }}</label>
                <input type="file" name="dokumen[{{ $dok }}]" class="form-control" required>
            </div>
        @endforeach

        <button class="btn btn-primary">Kirim Pendaftaran</button>
    </form>
</div>
@endsection
