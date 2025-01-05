@extends('layouts.app')
@section('title')
    Blog
@endsection
@section('body')
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="bg-light py-5">
    <div class="container text-center">
        <h1>Welcome to My Blog</h1>
        <p class="lead">Sharing ideas, thoughts, and stories.</p>
    </div>
</div>

<div class="container my-5">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Post Image">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->body, 20) }}</p>
                        <span class="badge bg-primary">{{ $post->category->name }}</span>
                        <p class="text-muted">{{ $post->created_at }}</p>
                        <a href="/post/{{ $post->id }}" class="btn btn-primary mt-2">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-light py-4">
    <div class="container text-center">
        <p>&copy; 2025 My Blog. All Rights Reserved.</p>
    </div>
</footer>

@endsection
