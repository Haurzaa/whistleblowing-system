<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />
    <title>Laporan Terkirim</title>
    <link rel="stylesheet" href="css/style.css" />

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary w-100">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img
            src="{{ asset('images/logo BPR.png') }}"
            alt=""
            width="50"
            height="30"
            class="d-inline-block align-text-top me-3"
          />
          WBS Bank Majalengka</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="{{ route('landingpage') }}"
                >Beranda</a
              >
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="{{ route('form.penuh') }}">Buat Laporan Penuh</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="{{ route('form.anonim') }}">Buat Laporan Anonim</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Laporan Terkirim -->
    <section id="terkirim">
      <div class="container">
        <div class="row">
          <div class="col-10 text-center mx-auto my-5">
            <div class="card-terkirim">
              <h4>LAPORAN ANDA BERHASIL TERKIRIM</h4>
              <img src="{{ asset('images/selesai.png') }}" alt="" />
              <p>
                Terima kasih telah melaporkan dugaan tindak pelanggaran yang
                telah dilakukan oleh karyawan kami. Sebagai bentuk terimakasih
                kami terhadap laporan yang Anda kirim, kami berkomitmen untuk
                merespon laporan Anda selambat-lambatnya 15 (Lima Belas) hari
                kerja sejak laporan Anda dikirim.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
     <section id="footer">
     <div class="container-fluid">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="container text-center text-white py-3 font-copyright ">
              Perumda BPR Majalengka 
              <span id="copyright">2025 </span> | Mitra Kerja Membangun Ekonomi Rakyat<br>
                Perumda BPR Majalengka berizin dan diawasi oleh Otoritas Jasa Keuangan &amp; Bank Indonesia <br>
                Perumda BPR Majalengka merupakan peserta penjaminan LPS. Maksimum nilai simpanan yang dijamin LPS per Nasabah per Bank adalah Rp2 Miliar. <br>
                Untuk cek Tingkat Bunga Penjaminan LPS, klik <a class="text-white" href="https://bankmajalengka.com/info/informasi-suku-bunga-penjaminan-lps" target="_blank" rel="noreferrer noopener">di sini</a>.<br>
            </div>
          </div>
        </div>
      </div>
     </div>
     </section>
  </body>
</html>
