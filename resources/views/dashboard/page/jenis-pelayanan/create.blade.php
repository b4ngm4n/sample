@extends('dashboard.app')

@section('title', 'Tambah Jenis Pelayanan')

@section('breadcrumbTitle', 'Jenis Pelayanan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('jenis-pelayanan.index') }}">List Jenis Pelayanan</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('jenis-pelayanan.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 mb-4">
               <h5>Tambah Data Jenis Pelayanan</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-pelayanan">Jenis Pelayanan</label>
               <input type="text" class="form-control" id="nama-pelayanan" name="nama_pelayanan" value="{{ old('nama_pelayanan') }}" placeholder="Contoh: PIN Polio / COVID 19 / IMUNISASI RUTIN">

               @error('nama_pelayanan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="tahun">Tahun</label>
               <input type="number" class="form-control" id="tahun" name="tahun" value="{{ old('tahun') }}" placeholder="Contoh: 2024">

               @error('tahun')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('jenis-pelayanan.index') }}" class="btn btn-danger w-md">Batal</a>
               <button type="submit" class="btn btn-primary w-md">Simpan</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection