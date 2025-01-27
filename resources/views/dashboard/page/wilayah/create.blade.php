@extends('dashboard.app')

@section('title', 'Tambah Wilayah')

@section('breadcrumbTitle', 'Wilayah')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('wilayah.index') }}">List Wilayah</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('wilayah.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 my-3">
               <h5>Tambah Data Wilayah</h5>
            </div>


            <div class="mb-3">
               <label for="nama_wilayah" class="form-label">Nama Wilayah <span class="text-danger">*</span></label>
               <input type="text" class="form-control" id="nama_wilayah" name="nama_wilayah" required>

               @error('nama_wilayah')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label for="kode_wilayah" class="form-label">Kode Wilayah <span class="text-danger">*</span></label>
               <input type="text" class="form-control" id="kode_wilayah" name="kode_wilayah" required>

               @error('nama_wilayah')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label for="tingkat_wilayah" class="form-label">Pilih Induk Wilayah</label>
               <select name="tingkat_wilayah" class="select2 form-select" data-placeholder="Pilih Induk Wilayah...">
                  <option value="">-- Pilih Induk Wilayah --</option>
                  @foreach ($wilayahs as $wilayah)
                  <option value="{{ $wilayah->uuid }}">{{ $wilayah->nama_wilayah . ' - '. $wilayah->jenis_wilayah }}</option>
                  @endforeach
               </select>

               @error('tingkat_wilayah')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="jenis_wilayah" class="form-label">Jenis Wilayah <span class="text-danger">*</span></label>
               <select name="jenis_wilayah" class="select2 form-select" data-placeholder="Pilih Jenis Wilayah..." required>
                  <option value="">-- Pilih Jenis Wilayah --</option>
                  <option value="provinsi">Provinsi</option>
                  <option value="kabkot">Kabkot</option>
                  <option value="kecamatan">Kecamatan</option>
                  <option value="kelurahan">Kelurahan</option>
                  <option value="desa">Desa</option>
               </select>

               @error('jenis_wilayah')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <a class="btn btn-danger" href="{{ route('wilayah.index') }}"><i class="ti-arrow-left me-2"></i>Batal</a>
            <button class="btn btn-primary" type="submit"><i class="ti-save me-2"></i>Simpan</button>

         </form>

      </div>
   </div>
</div>
@endsection