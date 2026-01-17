{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  {{-- Font Poppins --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Favicon --}}
  <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />

  <title>@yield('title', 'Dashboard Admin')</title>

  {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

</head>

<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <div>
      <div class="logo">
        <img src="{{ asset('images/logo BPR.png') }}" alt="Logo" />
        <span>WBS ADMIN</span>
      </div>

      <ul class="menu-sidebar">
        <li class="{{ request()->is('admin/dashboard') ? '' : '' }}">
          <img src="{{ asset('images/dashbord icon.png') }}" alt="Dashboard" class="icon" />
          <a href="{{ route('dashboard') }}">Dashboard</a>
        </li>

        <li class="{{ request()->is('admin/reports') ? 'active' : '' }}">
          <img src="{{ asset('images/report icon.png') }}" alt="Laporan Masuk" class="icon" />
          <a href="{{ route('laporan.masuk') }}">Laporan Masuk</a>
        </li>

        <li class="{{ request()->is('admin/reports/selesai') ? 'active' : '' }}">
          <img src="{{ asset('images/done.png') }}" alt="Laporan Selesai" class="icon" />
          <a href="{{ route('laporan.selesai') }}">Laporan Selesai</a>
        </li>
      </ul>
    </div>

    <div class="profile">
      <img src="{{ asset('images/admin.png') }}" alt="Profile" class="profile-img" />
      <div class="profile-info">
        <p class="admin-name">Admin WBS</p>
        <a href="{{ route('logout') }}" class="logout-link">Logout</a>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main">
    @yield('content')
  </div>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
const ctx = document.getElementById('laporanChart');

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Laporan Masuk', 'Laporan Pending', 'Laporan Selesai'],
        datasets: [{
            data: [
                {{ $laporanMasuk }},
                {{ $laporanPending }},
                {{ $laporanSelesai }}
            ],
            backgroundColor: ['#0d6efd', '#ffc107', '#198754']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>
</body>
</html>
