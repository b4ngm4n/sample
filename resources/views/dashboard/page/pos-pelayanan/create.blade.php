@extends('dashboard.app')

@section('title', 'Tambah Pos Pelayanan')

@section('breadcrumbTitle', 'Pos Pelayanan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('pos-pelayanan.index') }}">List Pos Pelayanan</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('pos-pelayanan.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 my-3">
               <h5>Tambah Data Pos Pelayanan</h5>
            </div>

            <div class="mb-3">
               <label for="jenis_pelayanan_" class="form-label">Jenis Pos Pelayanan</label>
               <select name="jenis_pelayanan" class="select2 form-select" data-placeholder="Pilih Jenis pos Pelayanan...">
                  @foreach ($jenisPelayanans as $name => $key)
                  <option value="{{ $key }}">{{ $name }}</option>
                  @endforeach
               </select>

               @error('jenis_pelayanan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label for="puskesmas" class="form-label">Puskesmas</label>
               <select name="puskesmas" class="select2 form-select" data-placeholder="Pilih Puskesmas...">
                  @foreach ($puskesmas as $name => $key)
                  <option value="{{ $key }}">{{ $name }}</option>
                  @endforeach
               </select>

               @error('puskesmas')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label for="kelurahan" class="form-label">Kelurahan</label>
               <select name="kelurahan" class="select2 form-select" data-placeholder="Pilih Kelurahan...">
                  @foreach ($kelurahans as $name => $key)
                  <option value="{{ $key }}">{{ $name }}</option>
                  @endforeach
               </select>

               @error('kelurahan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>


            <div class="mb-3">
               <label class="form-label" for="nama_pos">Nama Pos</label>
               <input type="text" class="form-control" id="nama_pos" name="nama_pos" value="{{ old('nama_pos') }}"
                  placeholder="Contoh: Seruni 1 / SDN 99 Kota Utara">

               @error('nama_pos')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="alamat">Alamat</label>
               <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}"
                  placeholder="Contoh: Jl. K.H Adam Zakaria">

               @error('alamat')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>
            

            <div class="mt-4">
               <a href="{{ route('pos-pelayanan.index') }}" class="btn btn-danger w-md">Batal</a>
               @can('permission', 'store-pos-pelayanan')
               <button type="submit" class="btn btn-primary w-md">Simpan</button>
               @endcan
            </div>
         </form>

      </div>
   </div>
</div>
@endsection