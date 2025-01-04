@extends('layouts.dashboard')
@section('title')
    Kelola Konten
@endsection
@section('isi')
    <div class="container my-5">
        <h1 class="text-center mb-4">Kelola Konten</h1>

        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPostModal">Tambah Post</button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Judul Post Pertama</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Judul Post Kedua</td>
                    <td>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices.</td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection