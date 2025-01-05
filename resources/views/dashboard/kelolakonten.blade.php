@extends('layouts.dashboard')
@section('title')
    Kelola Konten
@endsection
@section('isi')
    <div class="container my-5">
        <h1 class="text-center mb-4">Kelola Konten</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Button Tambah Post -->
        <div class="d-flex justify-content-end mb-3">
            <button class="btn btn-primary"><a href="/kelola-konten/create" style="color: #fff; text-decoration:none">Tambah Post</a></button>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($post as $index => $isi)
                    <tr>
                        <td>{{ $index = $index + 1 }}</td>
                        <td>{{ $isi->title }}</td>
                        <td>{{ Str::limit($isi->body, 50) }}</td>
                        <td>{{ $isi->category->name }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm"><a href="/kelola-konten/{{ $isi->id }}/edit" style="color: #fff; text-decoration: none;">Edit</a></button>
                            <form action="/kelola-konten/{{ $isi->id }}" method="POST" style="display: inline">
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