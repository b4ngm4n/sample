@extends('dashboard.app')

@section('title', 'Tambah Kabupaten')

@section('breadcrumbTitle', 'Kabupaten')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kabupaten.index') }}">List Kabupaten</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('kabupaten.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 mb-4">
               <h5>Tambah Data Kabupaten</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="provinsi">Provinsi</label>
               <select name="provinsi" class="select2 form-control"
                  data-placeholder="Pilih Provinsi ...">
                  @foreach ($provinsis as $provinsi)
                  <option value="{{ $provinsi->uuid }}">{{ $provinsi->nama_provinsi }}</option>
                  @endforeach
               </select>

               @error('provinsi')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-kabupaten">Nama Kabupaten</label>
               <input type="text" class="form-control" id="nama-kabupaten" name="nama_kabupaten"
                  value="{{ old('nama_kabupaten') }}">

               @error('nama_kabupaten')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-kabupaten">Kode Kabupaten</label>
               <input type="number" class="form-control" id="kode-kabupaten" name="kode_kabupaten"
                  value="{{ old('kode_kabupaten') }}">

               @error('kode_kabupaten')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('kabupaten.index') }}" class="btn btn-danger w-md">Batal</a>
               <button type="submit" class="btn btn-primary w-md">Simpan</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection