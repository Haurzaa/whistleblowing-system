<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Logo tittle -->
    <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />
    <title>Form Pengungkapan Penuh</title>
    <link rel="stylesheet" href="css/style.css" />
    <!-- CSS kamu -->
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

    <!-- form -->
    <div class="container mt-5">
      <h2 class="judul-form mb-4 text-center">Form Pengungkapan Penuh</h2>

      <form action="{{ route('report.store') }}" method="post" enctype="multipart/form-data" class="shadow p-4 rounded bg-light">
        @csrf
        <!-- Nama Lengkap -->
        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap</label>
          <input
            type="text"
            class="form-control"
            id="nama"
            name="nama"
            placeholder="Masukkan nama lengkap"
            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" 
            maxlength="255"
            required
          />
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="nama@email.com"
            required
          />
        </div>

        <!-- Jenis Laporan (Dropdown) -->
        <div class="mb-3">
          <label for="jenisLaporan" class="form-label">Jenis Laporan</label>
          <select
            class="form-select"
            id="jenisLaporan"
            name="jenis_laporan"
            required
          >
            <option value="">-- Pilih Jenis Laporan --</option>
            <option value="Fraud">Fraud - Mark up biaya</option>
            <option value="Fraud">
              Fraud - Penyalahgunaan fasilitas kantor
            </option>
            <option value="Fraud">
              Fraud - Penggunaan data/informasi internal untuk keuntungan
              pribadi
            </option>
            <option value="Korupsi & Penyuapan">
              Korupsi & Penyuapan - Gratifikasi
            </option>
            <option value="Korupsi & Penyuapan">
              Korupsi & Penyuapan - Penyalahgunaan jabatan
            </option>
            <option value="Pelanggaran Etika & Integritas">
              Pelanggaran Etika & Integrita - Konflik kepentingann
            </option>
            <option value="Pelanggaran Etika & Integritas">
              Pelanggaran Etika & Integrita - Nepotisme / pilih kasih dalam
              rekrutmen
            </option>
            <option value="Pelanggaran Etika & Integritas">
              Pelanggaran Etika & Integrita - Tindakan yang merusak reputasi
              organisasi
            </option>
            <option value="Pelanggaran Hukum & Regulasi">
              Pelanggaran Hukum & Regulasi - Pemalsuan dokumen
            </option>
            <option value="Pelanggaran Hukum & Regulasi">
              Pelanggaran Hukum & Regulasi - Penggelapan dana/asset
            </option>
            <option value="Pelanggaran Hukum & Regulasi">
              Pelanggaran Hukum & Regulasi - Manipulasi laporan keuangan
            </option>
            <option value="Pelanggaran Ketenagakerjaan">
              Pelanggaran Ketenagakerjaan - Diskriminasi
            </option>
            <option value="Pelanggaran Ketenagakerjaan">
              Pelanggaran Ketenagakerjaan - Pelecehan seksual maupun verbal
            </option>
            <option value="Pelanggaran Ketenagakerjaan">
              Pelanggaran Ketenagakerjaan - Intimidasi / perundungan di tempat
              kerja
            </option>
          </select>
        </div>

        <!-- Tempat Kejadian -->
        <div class="mb-3">
          <label for="tempat" class="form-label">Tempat Kejadian</label>
          <input
            type="text"
            class="form-control"
            id="tempat"
            name="tempat_kejadian"
            placeholder="Masukkan lokasi kejadian"
            required
          />
        </div>

        <!-- Tanggal Kejadian -->
        <div class="mb-3">
          <label for="tanggal" class="form-label">Tanggal Kejadian</label>
          <input
            type="date"
            class="form-control"
            onkeydown="return false" 
            onpaste="return false"
            id="tanggal"
            name="tanggal_kejadian"
            required
          />
        </div>

        <!-- Isi Laporan -->
        <div class="mb-3">
          <label for="isiLaporan" class="form-label">Isi Laporan</label>
          <textarea
            class="form-control"
            id="isiLaporan"
            name="isi_laporan"
            rows="5"
            placeholder="Tuliskan laporan Anda di sini..."
            required
          ></textarea>
        </div>

        <!-- Dokumen Pendukung -->
        <div class="mb-3">
          <label for="dokumen" class="form-label">Dokumen Pendukung</label>
          <input class="form-control" type="file" id="dokumen" name="dokumen_pendukung" />
          <small class="text-muted"
            >Format yang diperbolehkan: PDF, JPG, PNG, SLSX, MP3, MP4 (maks. 5MB)</small>
            <div id="fileError" class="text-danger mt-1" style="display: none;"></div>
</div>

<script>
document.getElementById('dokumen').addEventListener('change', function() {
    const file = this.files[0];
    const allowedExtensions = ['pdf', 'jpg', 'jpeg', 'png', 'xlsx', 'mp3', 'mp4'];
    const fileError = document.getElementById('fileError');
    fileError.style.display = 'none';
    fileError.textContent = '';
    this.classList.remove('is-invalid');

    if (file) {
        const fileExtension = file.name.split('.').pop().toLowerCase();
        const fileSize = file.size / 1024 / 1024; // dalam MB

        if (!allowedExtensions.includes(fileExtension)) {
            fileError.textContent = 'Format file tidak didukung. Gunakan PDF, JPG, PNG, atau XLSX.';
            fileError.style.display = 'block';
            this.classList.add('is-invalid');
            this.value = ''; // reset input
            alert('Format file tidak didukung!');
        } else if (fileSize > 5) {
            fileError.textContent = 'Ukuran file melebihi 5MB. Silakan unggah file yang lebih kecil.';
            fileError.style.display = 'block';
            this.classList.add('is-invalid');
            this.value = ''; // reset input
            alert('Ukuran file terlalu besar! Maksimal 5MB.');
        }
    }
});
</script>
        </div>

        <!-- Tombol -->
        <div class="tombol-kirim text-center">
          <button type="submit" class="btn btn-danger px-4">
            Kirim Laporan
          </button>
          <a href="{{ route('landingpage') }}" class="btn btn-secondary px-4">Batal</a>
        </div>
      </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
