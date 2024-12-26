@extends('dashboard.app')

@section('title', 'Detail Kelurahan')

@section('breadcrumbTitle', 'Kelurahan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kelurahan.index') }}">List Kelurahan</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-12">
   <div class="card">
      <div class="card-body">
         <div class="card-title">
            <h4 class="card-title">Detail kelurahan</h4>
         </div>
         <div class="row mb-4">
            <label for="nama-kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-kecamatan"
                  value="{{ $kelurahan->kecamatan->nama_kecamatan }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="nama-kelurahan" class="col-sm-3 col-form-label">Nama Kelurahan</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-kelurahan" value="{{ $kelurahan->nama_kelurahan }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="kode-kelurahan" class="col-sm-3 col-form-label">Kode Kelurahan</label>
            <div class="col-sm-9">
               <input type="email" class="form-control" id="kode-kelurahan" value="{{ $kelurahan->kode_kelurahan }}"
                  readonly>
            </div>
         </div>

         <a href="{{ route('kelurahan.index') }}" class="btn btn-primary w-md"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
   </div>
</div>

@endsection