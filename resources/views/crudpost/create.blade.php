@extends('layouts.dashboard')
@section('title')
    Tambah Data Post
@endsection
@section('isi')
<div class="container my-5">
    <h1 class="text-center mb-4">Buat Post Baru</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="/kelola-konten" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Konten</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body') }}</textarea>
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="1">Kategori 1</option>
                <option value="2">Kategori 2</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection