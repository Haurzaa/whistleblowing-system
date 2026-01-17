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
                <input type="password" name="password" class="form-control" placeholder="Password" required>
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
@endsection
