@extends('dashboard.app')

@section('title', 'Edit Provinsi')

@section('breadcrumbTitle', 'Provinsi')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('provinsi.index') }}">List Provinsi</a></li>
@endsection

@section('breadcrumbActive', 'Edit')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('provinsi.update', $provinsi->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border-bottom border-1 mb-4">
               <h5>Edit Data Provinsi</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-provinsi">Nama Provinsi</label>
               <input type="text" class="form-control" id="nama-provinsi" name="nama_provinsi" value="{{ old('nama_provinsi', $provinsi->nama_provinsi) }}">

               @error('nama_provinsi')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-provinsi">Kode provinsi</label>
               <input type="number" class="form-control" id="kode-provinsi" name="kode_provinsi" value="{{ old('kode_provinsi', $provinsi->kode_provinsi) }}">

               @error('kode_provinsi')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('provinsi.index') }}" class="btn btn-danger w-md">Batal</a>
               @can('permission', 'update-provinsi')
               <button type="submit" class="btn btn-warning w-md">Ubah</button>
               @endcan
            </div>
         </form>

      </div>
   </div>
</div>
@endsection