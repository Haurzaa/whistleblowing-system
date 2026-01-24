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
    <link rel="stylesheet" href="css/style.css" />

    <!-- Responsive -->
    <link rel="stylesheet" href="css/responsive.css" />

    <!-- Logo tittle -->
    <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />
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
              <a class="nav-link" href="#tentang">Tentang</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#kriteria">Kriteria</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link" href="#alur">Alur Pelaporan</a>
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

    <!-- Hero Section -->
    <section id="hero">
      <div class="container h-100">
        <div class="row h-100">
          <div class="col-md-6 hero-tagline my-auto">
            <h1>LAPORKAN DUGAAN TINDAKAN PELANGGARAN BANK MAJALENGKA</h1>
            <p>Laporkan pelanggaran secara aman, rahasia, dan terlindungi</p>
            <div class="dropdown">
              <button class="button-lg-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Buat Laporan</button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="{{ route('form.penuh') }}">Pengungkapan Penuh</a></li>
                  <li><a class="dropdown-item" href="{{ route('form.anonim') }}">Pengungkapan Anonim</a></li>
                </ul>
            </div>
          </div>
        </div>
        <img
          src="{{ asset('images/Hero img.png') }}"
          alt=""
          class="position-absolute end-0 bottom-0 img-hero"
        />
      </div>
    </section>

    <!-- tentang -->
    <section id="tentang">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <div class="card-tentang">
              <h2>TENTANG SISTEM WBS</h2>
              <p class="sub-title">
                Sistem ini bertujuan untuk menyediakan sarana bagi karyawan dan
                pemangku kepentingan eksternal untuk melaporkan dugaan
                pelanggaran etika, hukum, dan kebijakan perusahaan secara anonim
                maupun non-anonim. Implementasi WBS merupakan langkah strategis
                untuk memperkuat Good Corporate Governance (GCG), mendeteksi
                potensi risiko sejak dini, serta melindungi perusahaan dari
                kerugian finansial, operasional, dan reputasi. Identitas pelapor
                dijamin kerahasiaannya dan laporan akan ditindaklanjuti sesuai
                prosedur.
              </p>
            </div>
          </div>

          <!-- jaminan rahasia pengadu -->
          <div class="col-12 text-center mb-5">
            <div class="card-jaminan">
              <h3>JAMINAN RAHASIA PELAPOR</h3>
              <p class="sub-title">
                Anda tidak perlu khawatir terungkapnya identitas diri anda
                karena Bank Majalengka akan MERAHASIAKAN & MELINDUNGI Identitas
                Anda sebagai whistleblower. Kami sangat menghargai informasi
                yang Anda laporkan.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Kriteria pelaporan -->
    <section id="kriteria">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5">
            <h4>KRITERIA PENGADUAN</h4>
            <p class="deskripsi">
              Kriteria Laporan Dugaan Pelanggaran Agar Dapat Diproses Lebih
              Lanjut
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 text-center mb-4">
            <div class="card-kriteria position-relative">
              <img
                src="{{ asset('images/kriteria icon.png') }}"
                alt=""
                class="position-absolute start-0 top-0 kriteria-icon"
              />
              <h5 class="mt-3">WHAT</h5>
              <p class="mt-3">
                Adanya dugaan pelanggaran yang berindikasi tindak
                pidana korupsi/pelanggaran yang diketahui
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 text-center mb-4">
            <div class="card-kriteria position-relative">
              <img
                src="{{ asset('images/kriteria icon.png') }}"
                alt=""
                class="position-absolute start-0 top-0 kriteria-icon"
              />
              <h5 class="mt-3">WHO</h5>
              <p class="mt-3">
                Siapa pegawai Bank Majalengka yang melakukan dugaan pelanggaran
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 text-center mb-4">
            <div class="card-kriteria position-relative">
              <img
                src="{{ asset('images/kriteria icon.png') }}"
                alt=""
                class="position-absolute start-0 top-0 kriteria-icon"
              />
              <h5 class="mt-3">WHERE</h5>
              <p class="mt-3">
                Dimana tempat terjadinya dugaan pelanggaran tersebut dilakukan
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 text-center mb-4">
            <div class="card-kriteria position-relative">
              <img
                src="{{ asset('images/kriteria icon.png') }}"
                alt=""
                class="position-absolute start-0 top-0 kriteria-icon"
              />
              <h5 class="mt-3">WHEN</h5>
              <p class="mt-3">
                Kapan terjadinya dugaan pelanggaran tersebut dilakukan
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 text-center mb-4">
            <div class="card-kriteria position-relative">
              <img
                src="{{ asset('images/kriteria icon.png') }}"
                alt=""
                class="position-absolute start-0 top-0 kriteria-icon"
              />
              <h5 class="mt-3">HOW</h5>
              <p class="mt-3">
                Bagaimana cara dugaan pelanggaran tersebut dilakukan (modus,
                cara, dan lainnya)
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 text-center mb-4">
            <div class="card-kriteria position-relative">
              <img
                src="{{ asset('images/kriteria icon.png') }}"
                alt=""
                class="position-absolute start-0 top-0 kriteria-icon"
              />
              <h5 class="mt-3">EVIDENCE</h5>
              <p class="mt-3">
                Dilengkapi dengan bukti dugaan pelanggaran (dokumen/gambar) yang
                mendukung
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Alur pelaporan -->
    <section id="alur">
      <div class="container">
        <div class="row">
          <div class="col-12">
              <h4 class="text-center">ALUR PELAPORAN</h4>
              <p class="deskripsi text-center">
                Tata Cara Melaporkan Dugaan Pelanggaran
              </p>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-6 col-lg-3 text-center mb-4">
              <div class="card-alur">
                <img src="{{ asset('images/masuk form.png') }}" alt="">
                <h6>Masuk Form Laporan</h6>
                <p class="sub-card">Klik tombol "Buat Laporan" berwarna merah diatas</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 text-center mb-4">
              <div class="card-alur">
                <img src= "{{ asset('images/user form.png') }}" alt="">
                <h6>Pilih Menu Pengungkapan Penuh atau Anonim</h6>
                <p class="sub-card2">Anda dapat mengisi form dengan menyertakan identitas atau secara anonim</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 text-center mb-4">
              <div class="card-alur">
                <img src="{{ asset('images/form .png') }}" alt="">
                <h6>Isi Form Laporan Dugaan Pelanggaran</h6>
                <p class="sub-card2">Isi dan lengkapi formulir pengaduan yang telah disediakan</p>
              </div>
            </div>

            <div class="col-md-6 col-lg-3 text-center mb-4">
              <div class="card-alur">
                <img src="{{ asset('images/send form.png') }}" alt="">
                <h6>Kirimkan Form Laporan</h6>
                <p class="sub-card">Apabila isian form sudah lengkap, tekan tombol "Kirim Pengaduan" untuk mengirim laporan Anda</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- kontak -->
    <section id="kontak">
      <div class="container">
        <div class="row">
          <!-- Kontak -->
      <div class="col-md-5 col-12 mb-4">
        <h5 class="judul-kontak">Kontak Kami</h5>
        <p class="sub-kontak">
          Hubungi kami apabila Anda membutuhkan bantuan lebih lanjut tentang
          Whistleblowing System Bank Majalengka
        </p>
        <div class="mb-2">
          <img src="{{ asset('images/call icon.png') }}" alt="">
          <a href="#" class="nomor-kontak">+62811-1111-6526</a>
        </div>
        <div class="mb-2">
          <img src="{{ asset('images/email icon.png') }}" alt="">
          <a href="#" class="email-kontak">manajemenpusat@bprmajalengka.com</a>
        </div>
        <div class="mb-2 d-flex align-items-start">
          <img src="{{ asset('images/maps icon.png') }}" alt="">
          <a href="#" class="maps-kontak">
            Jl. Raya K H Abdul Halim No.338, Majalengka Wetan, Kec. Majalengka,
            Kabupaten Majalengka, Jawa Barat
          </a>
        </div>
      </div>

      <!-- Tautan -->
      <div class="col-md-2 col-12 mb-4">
        <h5 class="judul-kontak">Tautan</h5>
        <div class="judul-beranda"><a href="#hero">Beranda</a></div>
        <div class="judul-tentang"><a href="#tentang">Tentang</a></div>
        <div class="judul-kriteria"><a href="#kriteria">Kriteria</a></div>
        <div class="judul-alur"><a href="#alur">Alur Pelaporan</a></div>
        <div class="judul-kon"><a href="#kontak">Kontak</a></div>
      </div>

      <!-- Media sosial -->
      <div class="col-md-5 col-12 mb-4">
        <h5 class="judul-kontak">Media Sosial</h5>
        <a href="https://web.facebook.com/p/Bank-Majalengka-61560114869564/?_rdc=1&_rdr#"><img src="{{ asset('images/facebook icon.png') }}" alt=""></a>
        <a href="https://www.instagram.com/bankmajalengka/?igshid=MzNlNGNkZWQ4Mg%3D%3D"><img src="{{ asset('images/instagram icon.png') }}" alt=""></a>
        <a href="https://www.youtube.com/channel/UCeNzWJHDPQ9gC1t9yRzSqcg"><img src="{{ asset('images/youtube icon.png') }}"" alt=""></a>
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

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
