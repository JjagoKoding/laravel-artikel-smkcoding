@extends('layouts.dashboard')
@section('title')
    Update Data Post
@endsection
@section('isi')
<div class="container my-5">
    <h1 class="text-center mb-4">Update Data Post</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('konten.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Konten</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $post->body) }}</textarea>
            @error('body')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>
            <select name="category_id" id="category_id" class="form-control" required>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ old('category_id', $post->category_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" name="image" id="image" class="form-control" value="{{ old('image', $post->image) }}">
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Post" class="img-thumbnail mt-2" width="200">
            @endif
            @error('image')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection