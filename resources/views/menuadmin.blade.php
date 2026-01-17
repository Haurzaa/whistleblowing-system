<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- My style -->
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- Logo tittle -->
    <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />
    <title>Menu Admin</title>
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
              <a class="nav-link" href="{{ route('landingpage') }}#tentang">Tentang</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="{{ route('landingpage') }}#kriteria">Kriteria</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="{{ route('landingpage') }}#alur">Alur Pelaporan</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Menu -->
    <section id="menu">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h1>Menu Admin</h1>
            <p class="sub-menu text-center">
              Halo ADMIN, silakan pilih menu di bawah ini untuk mengelola
              laporan. Semoga harimu menyenangkan!
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="card-admin1 d-flex align-items-center">
              <a
                href="{{ route('dashboard') }}"
                class="d-flex align-items-center text-decoration-none"
              >
                <img
                  src="{{ asset('images/admin wbs.png') }}"
                  alt=""
                  class="admin-icon me-3"
                />
                <div class="admin-text">
                  <h5 class="h2 mb-0">ADMIN</h5>
                  <p class="mb-0">Tim Whistleblowing</p>
                </div>
              </a>
            </div>
          </div>

          
        </div>
      </div>
    </section>
  </body>
</html>
