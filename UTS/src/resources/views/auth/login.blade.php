@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h4>Login Mahasiswa</h4>
                </div>
                <div class="card-body">
                    @if ($errors->has('login'))
                        <div class="alert alert-danger">
                            {{ $errors->first('login') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" name="nim" class="form-control" value="{{ old('nim') }}" required autofocus>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>

                    <hr>
                    <p class="text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
