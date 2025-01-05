@extends('layouts.app')
@section('title', 'Login')

@section('body')

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <button type="submit">Login</button>
</form>
    

@endsection
