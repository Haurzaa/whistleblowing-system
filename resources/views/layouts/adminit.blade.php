{{-- resources/views/layouts/admin_it.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

  {{-- Font --}}
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  {{-- Favicon --}}
  <link rel="icon" href="{{ asset('images/logo BPR.png') }}" type="image/x-icon" />

  <title>@yield('title', 'Admin IT')</title>

  {{-- Custom CSS --}}
    <link rel="stylesheet" href="{{ asset('css/adminit.css') }}">

</head>

<body>
  {{-- Header --}}
  <nav class="navbar navbar-expand-lg navbar-dark position-fixed w-100">
    <div class="container">
      <a class="logo navbar-brand" href="#">
        <img src="{{ asset('images/logo BPR.png') }}" alt="Logo">
        Admin IT - WBS
      </a>
          <a href="{{ route('landingpage') }}" class="btn btn-danger logout-btn">Logout</a>
      </div>
      </div>
    </nav>

  {{-- Main --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  <footer>
    © {{ date('Y') }} WBS - Perumda BPR Majalengka. All rights reserved.
  </footer>

  {{-- Bootstrap JS --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
