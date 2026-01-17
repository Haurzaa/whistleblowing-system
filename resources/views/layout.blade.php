<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WBS Bank Majalengka')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
        </div>
      </div>
    </nav>

    <!-- ===== Konten Dinamis ===== -->
    <main class="container my-4">
        @yield('content')
    </main>

    <!-- ===== Footer ===== -->
    <footer class="bg-primary text-white text-center py-3 mt-5">
        <p class="mb-0">© 2025 WBS Bank Majalengka. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
