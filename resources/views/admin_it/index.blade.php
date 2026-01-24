@extends('layouts.adminit')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-center">Manajemen Akun Admin Whistleblowing</h3>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.it.store') }}" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="col-md-5">
    <div class="position-relative">
        <input
            type="password"
            name="password"
            id="adminPassword"
            class="form-control pe-5"
            placeholder="Password"
            required
        >

        <span
            id="toggleAdminPassword"
            class="position-absolute top-50 end-0 translate-middle-y me-3"
            style="cursor:pointer; display:none; z-index:10;"
        >
            <i class="bi bi-eye"></i>
        </span>
    </div>
</div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Tambah Admin</button>
            </div>
        </div>
    </form>

    <table class="table table-bordered text-center">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $i => $admin)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.it.delete', $admin->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus akun ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
const adminPassword = document.getElementById("adminPassword");
const toggleAdminPassword = document.getElementById("toggleAdminPassword");
const adminIcon = toggleAdminPassword.querySelector("i");

adminPassword.addEventListener("input", function () {
    if (this.value.length > 0) {
        toggleAdminPassword.style.display = "block";
    } else {
        toggleAdminPassword.style.display = "none";
        this.type = "password";
        adminIcon.className = "bi bi-eye";
    }
});

toggleAdminPassword.addEventListener("click", function () {
    if (adminPassword.type === "password") {
        adminPassword.type = "text";
        adminIcon.className = "bi bi-eye-slash";
    } else {
        adminPassword.type = "password";
        adminIcon.className = "bi bi-eye";
    }
});
</script>

@endsection
