@extends('layouts.app')
@section('title')

@endsection
@section('body')
    
    

    <header class="bg-light py-5">
        <div class="container text-center">
            <h1>{{ $post->title }}</h1>
            <p class="text-muted">{{ $post->created_at }} | Category: {{ $post->category->name }}</p>
        </div>
    </header>


    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mb-4 mx-auto d-block" alt="Post Image">
                <p style="text-align: justify">{{ $post->body }}</p>
            </div>
        </div>
    </div>


    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>&copy; 2025 My Blog. All Rights Reserved.</p>
        </div>
    </footer>


@endsection