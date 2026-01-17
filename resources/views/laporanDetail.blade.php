<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />
    <title>Detail Laporan</title>

    <style>
      /* ====== Global Style ====== */
      * {
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      body {
        margin: 0;
        padding: 0;
        background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
      }

      .container {
        width: 100%;
        max-width: 750px;
        padding: 20px;
      }

      /* ====== Card Style ====== */
      .card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 30px 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
      }

      .card h4 {
        color: #333;
        font-size: 24px;
        margin-bottom: 25px;
        border-bottom: 3px solid #0033ab;
        display: inline-block;
        padding-bottom: 5px;
      }

      .card p {
        font-size: 15px;
        color: #444;
        margin-bottom: 10px;
      }

      .card p strong {
        color: #111;
      }

      hr {
        border: 0;
        height: 1px;
        background: #ddd;
        margin: 25px 0;
      }

      /* ====== Form Style ====== */
      textarea {
        width: 100%;
        border: 1.5px solid #ccc;
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 14px;
        resize: none;
        outline: none;
        transition: 0.2s;
      }

      textarea:focus {
        border-color: #0033ab;
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.4);
      }

      button {
        background-color: #0033ab;
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.3s ease, transform 0.2s;
      }

      .alert {
        background: #f2f3f5;
        color: #555;
        border-left: 4px solid #999;
        padding: 15px;
        border-radius: 10px;
        font-size: 14px;
      }

      .isi-laporan {
      white-space: normal;
      word-wrap: break-word;
      overflow-wrap: break-word;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="card">
        <h4> Detail Laporan #{{ $laporan->id }}</h4>
        <p><strong>Pelapor:</strong> {{ $laporan->nama ?? 'Anonim' }}</p> <p><strong>Email:</strong> {{ $laporan->email ?? '-' }}</p> <p><strong>Tempat Kejadian:</strong> {{ $laporan->tempat_kejadian ?? '-' }}</p> <p><strong>Tanggal Kejadian:</strong> {{\Carbon\Carbon::parse ($laporan->tanggal_kejadian)->format('d-m-Y') ?? '-' }}</p> <p><strong>Jenis Laporan:</strong> {{ $laporan->jenis_laporan }}</p> <p class="isi-laporan"><strong>Isi Laporan:</strong> {{ $laporan->isi_laporan }}</p> @if($laporan->dokumen_pendukung) <p><strong>Dokumen Pendukung:</strong> <a href="{{ asset('storage/' . $laporan->dokumen_pendukung) }}" target="_blank" class="link">📎 Lihat</a></p> @else <p><strong>Dokumen Pendukung:</strong> Tidak ada</p> @endif <hr> {{--Notifikasi sukses / gagal --}} @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif @if(session('error')) <div class="alert alert-danger">{{ session('error') }}</div> @endif @if($laporan->email) <h5 class="mb-3">Kirim Balasan</h5> <form action="{{ route('balasan.kirim', $laporan->id) }}" method="POST"> @csrf <div class="mb-3"> <textarea name="message" class="form-control" rows="4" placeholder="Tulis balasan..." required></textarea> </div> <br /><br /> <button type="submit" class="btn btn-success px-4">Kirim</button> </form> 
        @else
  <div class="alert alert-secondary mt-3">
    Pelapor tidak mencantumkan email, jadi tidak bisa dikirimi balasan.
  </div>

  <form action="{{ route('laporan.selesai') }}" method="POST" style="margin-top: 15px;">
  @csrf
  <input type="hidden" name="id" value="{{ $laporan->id }}">
  <button type="submit" class="btn btn-primary" style="background:#0033ab; border:none; padding:10px 20px; border-radius:8px; font-weight:600;">
    Tandai Selesai
  </button>
</form>

@endif
      </div>
    </div>
  </body>
</html>
