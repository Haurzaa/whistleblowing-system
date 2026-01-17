@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-xl font-bold text-gray-800">📋 Daftar Laporan Selesai</h2>

    {{-- Alert pesan sukses / error --}}
    @if(session('success'))
        <div class="alert alert-success mb-3">
            ✅ {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error mb-3">
            ⚠️ {{ session('error') }}
        </div>
    @endif

    {{-- Form download rekap Excel --}}
    <div class="mb-4 flex items-center gap-2 bg-white p-3 rounded-lg shadow-sm">
        <form action="{{ route('laporan.export') }}" method="GET" class="flex flex-wrap items-center gap-3">
            <label for="bulan" class="font-semibold text-gray-700">Pilih Bulan:</label>
            <input type="month" name="bulan" id="bulan" class="border border-gray-300 rounded px-2 py-1 focus:ring-2 focus:ring-blue-500 focus:outline-none">

            <button type="submit" class="btn-download">
                ⬇ Download Rekap Excel
            </button>
        </form>
    </div>

    {{-- Table daftar laporan selesai --}}
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Laporan</th>
                    <th>Tempat Kejadian</th>
                    <th>Tanggal Kejadian</th>
                    <th>Dokumen</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reports as $key => $laporan)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $laporan->nama ?? '-' }}</td>
                        <td>{{ $laporan->email ?? '-' }}</td>
                        <td>{{ $laporan->jenis_laporan }}</td>
                        <td>{{ $laporan->tempat_kejadian }}</td>
                        <td>{{ \Carbon\Carbon::parse($laporan->tanggal_kejadian)->format('d-m-Y') }}</td>
                        <td>
                            @if($laporan->dokumen_pendukung)
                                <a href="{{ asset('storage/' . $laporan->dokumen_pendukung) }}" target="_blank" class="link">
                                    📎 Lihat
                                </a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <span class="badge 
                                {{ $laporan->status == 'pending' ? 'badge-warning' : 
                                   ($laporan->status == 'selesai' ? 'badge-success' : 'badge-secondary') }}">
                                {{ ucfirst($laporan->status) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-gray-500 py-3">
                            Belum ada laporan selesai
                        </td>
                    </tr>
                @endforelse
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
    overflow-x: auto;
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
.badge-success { background-color: #16a34a; color: #fff; }
.badge-secondary { background-color: #9ca3af; color: #fff; }

.link {
    color: #2563eb;
    text-decoration: none;
}
.link:hover {
    text-decoration: underline;
}

.btn-download {
    background-color: #0033AB;
    color: white;
    padding: 8px 14px;
    border-radius: 8px;
    border: none;
    font-weight: 600;
    cursor: pointer;
    transition: 0.2s;
    margin-bottom: 10px;
    margin-top: 5px;
}
.btn-download:hover {
    background-color: #16a34a; /* hijau saat hover */
}

/* Alert messages */
.alert {
    padding: 10px 15px;
    border-radius: 8px;
    font-weight: 500;
}
.alert-success {
    background-color: #dcfce7;
    color: #166534;
    border: 1px solid #22c55e;
}
.alert-error {
    background-color: #fee2e2;
    color: #991b1b;
    border: 1px solid #ef4444;
}
</style>
@endsection
