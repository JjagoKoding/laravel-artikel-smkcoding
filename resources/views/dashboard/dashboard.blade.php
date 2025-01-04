@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('body')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 col-lg-2 bg-dark text-white p-3" style="min-height: 100vh;">
            <h4 class="text-center">Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="#home" data-bs-toggle="collapse">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#settings" data-bs-toggle="collapse">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#profile" data-bs-toggle="collapse">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#logout" data-bs-toggle="collapse">Logout</a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="col-md-9 col-lg-10 p-4">
            <div id="home">
                <h2>Home Page</h2>
                <p>Selamat datang di dashboard utama!</p>
            </div>
            <div id="settings" class="collapse">
                <h2>Settings</h2>
                <p>Halaman pengaturan akan ditampilkan di sini.</p>
            </div>
            <div id="profile" class="collapse">
                <h2>Profile</h2>
                <p>Halaman profil pengguna.</p>
            </div>
            <div id="logout" class="collapse">
                <h2>Logout</h2>
                <p>Halaman logout.</p>
            </div>
        </div>
    </div>
</div>
@endsection