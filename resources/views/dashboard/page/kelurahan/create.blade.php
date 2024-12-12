@extends('dashboard.app')

@section('title', 'Edit Kelurahan')

@section('breadcrumbTitle', 'Kelurahan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kelurahan.index') }}">List Kelurahan</a></li>
@endsection

@section('breadcrumbActive', 'Edit')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('kelurahan.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 mb-4">
               <h5>Tambah Data Kelurahan</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="kecamatan">Kecamatan</label>
               <select name="kecamatan" class="select2 form-control" data-placeholder="Pilih Kecamatan ...">
                  @foreach ($kecamatans as $name => $key)
                  <option value="{{ $key }}">{{ $name }}</option>
                  @endforeach
               </select>

               @error('kecamatan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-kelurahan">Nama kelurahan</label>
               <input type="text" class="form-control" id="nama-kelurahan" name="nama_kelurahan"
                  value="{{ old('nama_kelurahan') }}">

               @error('nama_kelurahan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-kelurahan">Kode kelurahan</label>
               <input type="number" class="form-control" id="kode-kelurahan" name="kode_kelurahan"
                  value="{{ old('kode_kelurahan') }}">

               @error('kode_kelurahan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('kelurahan.index') }}" class="btn btn-danger w-md">Batal</a>
               <button type="submit" class="btn btn-primary w-md">Tambah</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection