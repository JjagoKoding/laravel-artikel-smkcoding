@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('body')
    <div class="alert alert-danger text-center">
        <h1>403</h1>
        <p>Anda tidak memiliki izin untuk mengakses halaman ini.</p>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Kembali</button>
        </form>
    </div>
@endsection
