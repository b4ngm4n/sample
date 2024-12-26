@extends('dashboard.app')

@section('title', 'Detail Pos Pelayanan')

@section('breadcrumbTitle', 'Pos Pelayanan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('pos-pelayanan.index') }}">List Pos Pelayanan</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-12">
   <div class="card">
      <div class="card-title mt-4 ms-4 me-4">
         <h4 class="card-title float-start">Detail Pos Pelayanan</h4>
         
         <a href="{{ route('pos-pelayanan.index') }}" class="btn btn-primary w-md float-end"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
      <div class="card-body">

         <div class="row mb-4">
            <label for="jenis" class="col-sm-3 col-form-label">Jenis Pelayanan</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="jenis" value="{{ $posPelayanan->jenisPelayanan->nama_pelayanan }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="puskesmas" class="col-sm-3 col-form-label">Puskesmas</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="puskesmas" value="{{ $posPelayanan->puskesmas->nama_puskesmas }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="kelurahan" value="{{ $posPelayanan->kelurahan->nama_kelurahan }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="nama_pos" class="col-sm-3 col-form-label">Nama Pos</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama_pos" value="{{ $posPelayanan->nama_pos_pelayanan }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="alamat" value="{{ $posPelayanan->alamat }}"
                  readonly>
            </div>
         </div>
         
      </div>
   </div>
</div>

@endsection