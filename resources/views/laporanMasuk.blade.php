@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-xl font-bold">📋 Daftar Laporan Masuk</h2>

    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Laporan</th>
                    <th>Tempat Kejadian</th>
                    <th>Tanggal Kejadian</th>
                    <th>Status</th>
                    <th>Dokumen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->nama ?? '-' }}</td>
                    <td>{{ $report->email ?? '-' }}</td>
                    <td>{{ $report->jenis_laporan }}</td>
                    <td>{{ $report->tempat_kejadian }}</td>
                    <td>{{ \Carbon\Carbon::parse($report->tanggal_kejadian)->format('d-m-Y') }}</td>
                    <td>
                        <span class="badge 
                            {{ $report->status == 'pending' ? 'badge-warning' : ($report->status == 'selesai' ? 'badge-success' : 'badge-secondary') }}">
                            {{ ucfirst($report->status) }}
                        </span>
                    </td>
                    <td>
                        @if($report->dokumen_pendukung)
                            <a href="{{ asset('storage/' . $report->dokumen_pendukung) }}" target="_blank" class="link">📎 Lihat</a>
                        @else
                            -
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('laporan.detail', $report->id) }}" class="btn-detail">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- CSS langsung di file ini --}}
<style>
.table-container {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}
.table {
    width: 100%;
    border-collapse: collapse;
}
.table thead {
    background-color: #0033AB; /* biru tua */
    color: white;
}
.table th, .table td {
    padding: 12px 16px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.badge {
    padding: 4px 10px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 600;
}
.badge-warning { background-color: #facc15; color: #000; }
.badge-success { background-color: #22c55e; color: #fff; }
.badge-secondary { background-color: #9ca3af; color: #fff; }

.link {
    color: #2563eb;
    text-decoration: none;
}
.link:hover {
    text-decoration: underline;
}

.btn-detail {
    background-color: #2563eb;
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 0.9rem;
}
.btn-detail:hover {
    background-color: #0033AB;
}
</style>
@endsection
