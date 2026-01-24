<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />
    <title>Login Admin</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
  href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
  rel="stylesheet"
/>

    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />
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

    <section id="login">
  <div class="container">
    <div class="row">
      <div class="col-6 mx-auto my-5">
        <div class="card-login p-4 shadow">
          <h4 class="text-center mb-4">LOGIN ADMIN</h4>

          <!-- Form Login -->
<form action="{{ route('login.submit') }}" method="POST" id="loginForm">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input 
            type="text" 
            name="username" 
            id="username" 
            class="form-control @if(session('error')) is-invalid @endif" 
            required
        >
    </div>

    <div class="mb-3 position-relative">
  <label for="password" class="form-label">Password</label>

  <input
    type="password"
    name="password"
    id="password"
    class="form-control pe-5 @if(session('error')) is-invalid @endif"
    required
  >

  <span
    id="togglePassword"
    class="position-absolute"
    style="
      right: 15px;
      top: 38px;   /* ← ini yang bikin sejajar input */
      cursor: pointer;
      display: none;
      color: #6c757d;
    "
  >
    <i class="bi bi-eye"></i>
  </span>
</div>
    

    <button type="submit" class="btn btn-primary w-100 mt-4">Login</button>
</form>

@if(session('error'))
    <div class="alert alert-danger mt-2">
        {{ session('error') }}
    </div>
@endif

<!-- Script Validasi -->
<script>
document.getElementById("loginForm").addEventListener("submit", function(e) {
    const username = document.getElementById("username");
    const password = document.getElementById("password");

    // reset dulu error style
    username.classList.remove("is-invalid");
    password.classList.remove("is-invalid");

    let valid = true;

    // kalau kosong
    if (username.value.trim() === "") {
        username.classList.add("is-invalid");
        valid = false;
    }
    if (password.value.trim() === "") {
        password.classList.add("is-invalid");
        valid = false;
    }

    if (!valid) {
        e.preventDefault(); // hentikan submit form
    }
});
</script>

        </div>
      </div>
    </div>
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <script>
const passwordInput = document.getElementById("password");
const togglePassword = document.getElementById("togglePassword");
const icon = togglePassword.querySelector("i");

// icon muncul kalau ada isi
passwordInput.addEventListener("input", function () {
  if (this.value.length > 0) {
    togglePassword.style.display = "block";
  } else {
    togglePassword.style.display = "none";
    passwordInput.type = "password";
    icon.classList.remove("bi-eye-slash");
    icon.classList.add("bi-eye");
  }
});

// toggle show / hide
togglePassword.addEventListener("click", function () {
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    icon.classList.remove("bi-eye");
    icon.classList.add("bi-eye-slash");
  } else {
    passwordInput.type = "password";
    icon.classList.remove("bi-eye-slash");
    icon.classList.add("bi-eye");
  }
});
</script>

  </body>
</html>
