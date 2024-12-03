@extends('auth.app')

@section('title', 'Login')

@section('content')

{{-- Menampilkan session flash error --}}
@if (session('error'))
<div class="log-header-area card p-4 mb-4 text-center">
  <span class="text-danger">{{ session('error') }}</span>
</div>
@endif

<div class="log-header-area card p-4 mb-4 text-center">
  <h5>Selamat Datang !</h5>
  <p class="mb-0">Silahkan Login.</p>
</div>

<div class="card">
  <div class="card-body p-4">
    <form action="{{ route('login.store') }}" method="POST">
      @csrf
      <div class="form-group mb-3">
        <label class="text-muted" for="username">Username</label>
        <input class="form-control" type="text" id="username" value="{{ old('username') }}"
          placeholder="Masukan Username" name="username">

        {{-- Menampilkan error validasi untuk username --}}
        @error('username')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group mb-3">
        <label class="text-muted" for="password">Password</label>
        <input class="form-control" type="password" id="password" required placeholder="Enter your password"
          name="password">

        {{-- Menampilkan error validasi untuk password --}}
        @error('password')
        <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>

      <div class="form-group mb-3">
        <button class="btn btn-primary btn-lg w-100" type="submit">Login</button>
      </div>
    </form>
  </div>
</div>
@endsection