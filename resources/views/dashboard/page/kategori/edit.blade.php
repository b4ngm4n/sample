@extends('dashboard.app')

@section('title', 'Ubah Kategori')

@section('breadcrumbTitle', 'Kategori')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">List Kategori</a></li>
@endsection

@section('breadcrumbActive', 'Ubah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('kategori.update', $kategori->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border-bottom border-1 my-3">
               <h5>Ubah Data Kategori</h5>
            </div>


            <div class="mb-3">
               <label for="nama_kategori" class="form-label">Nama Kategori <span class="text-danger">*</span></label>
               <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Imunisasi TT WUS Tidak Hamil" value="{{ $kategori->nama_kategori }}" required>

               @error('nama_kategori')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label for="jenis_kategori" class="form-label">Pilih Jenis Kategori</label>
               <select name="jenis_kategori" class="select2 form-select" data-placeholder="Pilih Jenis Kategori...">
                  <option value="{{ $kategori->jenis_kategori }}">{{ Str::upper($kategori->jenis_kategori) }}</option>
                  <option value="">-- Pilih Jenis Kategori --</option>
                  <option value="pws">PWS</option>
                  <option value="pin">PIN POLIO</option>
                  <option value="bias">BIAS</option>
                  <option value="bian">BIAN</option>
                  <option value="kegiatan">KEGIATAN</option>
               </select>

               @error('jenis_kategori')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
            
            <div class="mb-3">
               <label for="status_kategori" class="form-label">Status Kategori <span class="text-danger">*</span></label>
               <select name="status_kategori" class="select2 form-select" data-placeholder="Pilih Status Kategori..." required>
                  <option value="{{ $kategori->status_kategori }}">{{ Str::upper($kategori->status_kategori == 'tt+' ? 'TT WUS' : $kategori->status_kategori) }}</option>
                  <option value="">-- Pilih Status Kategori --</option>
                  <option value="idl">IDL</option>
                  <option value="ibl">IBL</option>
                  <option value="tt+">TT WUS</option>
                  <option value="ideal">IDEAL</option>
                  <option value="langsung">LANGSUNG</option>
               </select>

               @error('status_kategori')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label for="keterangan" class="form-label">Catatan</label>
               <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Apapun Itu" value="{{ $kategori->keterangan }}">

               @error('keterangan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <a class="btn btn-danger" href="{{ route('kategori.index') }}"><i class="ti-arrow-left me-2"></i>Batal</a>
            <button class="btn btn-warning" type="submit"><i class="ti-save me-2"></i>Ubah</button>

         </form>

      </div>
   </div>
</div>
@endsection