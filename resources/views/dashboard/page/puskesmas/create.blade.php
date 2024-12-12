@extends('dashboard.app')

@section('title', 'Tambah Puskesmas')

@section('breadcrumbTitle', 'Puskesmas')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('puskesmas.index') }}">List Puskesmas</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('puskesmas.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 my-3">
               <h5>Tambah Data Puskesmas</h5>
            </div>

            <div class="mb-3">
               <label for="kecamatan" class="form-label">Kecamatan</label>
               <select name="kecamatan" class="select2 form-select" data-placeholder="Pilih Kecamatan ...">
                  @foreach ($kecamatans as $name => $key)
                  <option value="{{ $key }}">{{ $name }}</option>
                  @endforeach
               </select>

               @error('kecamatan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-puskesmas">Nama Puskesmas</label>
               <input type="text" class="form-control" id="nama-puskesmas" name="nama_puskesmas"
                  placeholder="PUSKESMAS KOTA UTARA">

               @error('nama_puskesmas')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-puskesmas">Kode Puskesmas</label>
               <input type="text" class="form-control" id="kode-puskesmas" name="kode_puskesmas" placeholder="101">

               @error('kode_puskesmas')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="alamat-puskesmas">Alamat Puskesmas</label>
               <input type="text" class="form-control" id="alamat-puskesmas" name="alamat_puskesmas"
                  placeholder="JL. K.H Adam Zakaria">

               @error('alamat_puskesmas')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="status" name="status">
                  <label class="form-check-label" for="status">
                     Status Aktif
                  </label>
               </div>
            </div>

            <div class="mt-4">
               <button type="submit" class="btn btn-primary w-md">Simpan</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection