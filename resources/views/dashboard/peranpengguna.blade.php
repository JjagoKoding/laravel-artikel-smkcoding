@extends('layouts.dashboard')
@section('title')
    Peran Pengguna
@endsection
@section('isi')
    <div class="container my-5">
        <h1 class="text-center mb-4">Peran Pengguna</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary"><a href="/peran-pengguna/create" style="color: #fff; text-decoration:none">Tambah User</a></button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index => $isi)
                    <tr>
                        <td>{{ $index = $index + 1 }}</td>
                        <td>{{ $isi->name }}</td>
                        <td>{{ $isi->email }}</td>
                        <td>{{ $isi->password }}</td>
                        <td>{{ $isi->role }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><a href="/peran-pengguna/{{ $isi->id }}/edit" style="color: #fff; text-decoration: none;">Edit</a></button>
                            <form action="/peran-pengguna/{{ $isi->id }}" method="POST" style="display: inline">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-sm" type="submit">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection