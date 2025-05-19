@extends('frontend.layouts.app')

@section('content')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Status Pendaftaran Beasiswa</h1>

    <div class="card">
        <div class="card-body">
            @if ($pendaftarans->isEmpty())
                <p>Anda belum mendaftar beasiswa apapun.</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Beasiswa</th>
                            <th>Status</th>
                            <th>Catatan</th>
                            <th>Tanggal Daftar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftarans as $pendaftaran)
                        <tr>
                            <td>{{ $pendaftaran->beasiswa->nama }}</td>
                            <td>
                                @php
                                    $statusColor = match($pendaftaran->status) {
                                        'pending' => 'warning',
                                        'diterima' => 'success',
                                        'ditolak' => 'danger',
                                        'revisi' => 'info',
                                        default => 'secondary'
                                    };
                                @endphp
                                <span class="badge bg-{{ $statusColor }}">
                                    {{ ucfirst($pendaftaran->status) }}
                                </span>
                            </td>
                            <td>{{ $pendaftaran->catatan ?? '-' }}</td>
                            <td>{{ $pendaftaran->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
