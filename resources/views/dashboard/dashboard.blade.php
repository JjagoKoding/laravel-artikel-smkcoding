@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('body')
<div class="container-fluid">
    <div class="row">
        @include('include.sidebar')
        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <div id="home">
                <h2>Home Page</h2>
                <p>Selamat datang di dashboard utama!</p>
            </div>
        </div>
    </div>
</div>
@endsection