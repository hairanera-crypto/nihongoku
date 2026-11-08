@extends('layouts.app')
@section('title', 'Masuk | NihongoLearn')
@section('content')
<div class="page-wrap auth-wrap">
    <section class="content-panel auth-panel">
        <span class="section-index">SELAMAT DATANG KEMBALI</span>
        <h1 class="h2 mt-3">Masuk ke akun</h1>
        <p class="text-secondary">Lanjutkan perjalanan belajar bahasa Jepangmu.</p>
        @if (session('status'))
            <div class="alert alert-success mt-3" role="status">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login.store') }}" class="mt-4">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                @error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" id="password" name="password" type="password" required>
                @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
            </div>
            <div class="form-check mb-3"><input class="form-check-input" id="remember" name="remember" type="checkbox"><label class="form-check-label" for="remember">Ingat saya</label></div>
            <button class="btn btn-primary w-100 py-2" type="submit">Masuk</button>
        </form>
        <p class="mt-4 mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar sebagai siswa</a></p>
    </section>
</div>
@endsection