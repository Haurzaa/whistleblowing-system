@extends('layouts.admin')

@section('content')
<div class="admin-dashboard">
    <h1>DASHBOARD ADMIN WHISTLEBLOWING</h1>

    <div class="card-report">
    <div class="card">
        Laporan Masuk <br />
        <span class="jumlah">{{ $laporanMasuk }}</span>
    </div>
    <div class="card">
        Laporan Pending <br />
        <span class="jumlah">{{ $laporanPending }}</span>
    </div>
    <div class="card">
        Laporan Selesai <br />
        <span class="jumlah">{{ $laporanSelesai }}</span>
    </div>
</div>
    <div class="col-md-8 mt-3">
        <div class="card h-100">
            <div class="card-body">
                <h5 class="mb-3">Grafik Status Laporan</h5>

                <div class="chart-wrapper">
                    <canvas id="laporanChart"></canvas>
                </div>

            </div>
        </div>
    </div>
</div>
    
@endsection
