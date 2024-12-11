@extends('dashboard.app')

@section('title', 'Tambah Provinsi')

@section('breadcrumbTitle', 'Provinsi')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('provinsi.index') }}">List Provinsi</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('provinsi.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 mb-4">
               <h5>Tambah Data Provinsi</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-provinsi">Nama Provinsi</label>
               <input type="text" class="form-control" id="nama-provinsi" name="nama_provinsi" value="{{ old('nama_provinsi') }}">

               @error('nama_provinsi')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-provinsi">Kode provinsi</label>
               <input type="number" class="form-control" id="kode-provinsi" name="kode_provinsi" value="{{ old('kode_provinsi') }}">

               @error('kode_provinsi')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('provinsi.index') }}" class="btn btn-danger w-md">Batal</a>
               <button type="submit" class="btn btn-primary w-md">Simpan</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection