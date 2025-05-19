@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Registrasi Mahasiswa</h4>
                </div>
                <div class="card-body">

                    {{-- 🔴 Tampilkan semua error validasi --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name') }}" required autofocus>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror"
                                value="{{ old('nim') }}" required>
                            @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        {{-- (Opsional) Tambahan Data --}}
                        <div class="mb-3">
                            <label for="jurusan" class="form-label">Jurusan (Opsional)</label>
                            <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan') }}">
                        </div>

                        <div class="mb-3">
                            <label for="fakultas" class="form-label">Fakultas (Opsional)</label>
                            <input type="text" name="fakultas" class="form-control" value="{{ old('fakultas') }}">
                        </div>

                        <div class="mb-3">
                            <label for="no_hp" class="form-label">No. HP (Opsional)</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp') }}">
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>

                    <hr>
                    <p class="text-center">Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
