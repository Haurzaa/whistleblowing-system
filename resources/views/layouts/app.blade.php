<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <!-- My style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />

    <!-- Logo tittle -->
    <link rel="icon" href="Assets/img/Logo BPR.png" type="image/x-icon" />
    <title>WBS Bank Majalengka</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav
      class="navbar navbar-expand-lg navbar-dark bg-primary position-fixed w-100"
    >
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
          <ul class="navbar-nav mx-auto">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="#"
                >Beranda</a
              >
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Tentang</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Kriteria</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#">Alur Pelaporan</a>
            </li>
          </ul>
          <div>
          <a href="{{ route('login') }}">
            <button class="button-primary">Login</button>
          </a>
          </div>
        </div>
      </div>
    </nav>

    {{-- Konten halaman (berubah-ubah tergantung view) --}}
    <div class="container mt-4">
        @yield('content')
    </div>

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

    {{-- Script JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>