@extends('layouts.app')
@section('title', 'Daftar | NihongoLearn')
@section('content')
<div class="page-wrap auth-wrap">
    <section class="content-panel auth-panel">
        <span class="section-index">LANGKAH PERTAMA</span>
        <h1 class="h2 mt-3">Buat akun siswa</h1>
        <p class="text-secondary">Mulai dari huruf pertama, selangkah demi selangkah.</p>
        <form method="POST" action="{{ route('register.store') }}" class="mt-4">
            @csrf
            <div class="mb-3"><label class="form-label" for="name">Nama</label><input class="form-control" id="name" name="name" value="{{ old('name') }}" required>@error('name')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
            <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required>@error('email')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
            <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control" id="password" name="password" type="password" required>@error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror</div>
            <div class="mb-3"><label class="form-label" for="password_confirmation">Ulangi password</label><input class="form-control" id="password_confirmation" name="password_confirmation" type="password" required></div>
            <button class="btn btn-primary w-100 py-2" type="submit">Buat akun</button>
        </form>
        <p class="mt-4 mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
    </section>
</div>
@endsection