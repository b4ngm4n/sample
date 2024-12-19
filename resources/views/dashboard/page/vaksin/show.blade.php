@extends('dashboard.app')

@section('title', 'Detail Vaksin')

@section('breadcrumbTitle', 'Vaksin')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('vaksin.index') }}">List Vaksin</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-12">
   <div class="card">
      <div class="card-title mt-4 ms-4 me-4">
         <h4 class="card-title float-start">Detail Vaksin</h4>

         <a href="{{ route('vaksin.index') }}" class="btn btn-primary w-md float-end"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
      <div class="card-body">
         <div class="row">
            <div class="col-xl-6 col-sm-12">
               <div class="mb-3">
                  <label for="jenis_pelayanan_" class="form-label">Jenis Vaksin</label>
                  <input type="text" class="form-control" id="nama-vaksin"
                     value="{{ $vaksin->jenisPelayanan->nama_pelayanan }}" readonly>
               </div>

               <div class="mb-3">
                  <label class="form-label" for="nama-vaksin">Nama Vaksin</label>
                  <input type="text" class="form-control" id="nama-vaksin" value="{{ $vaksin->nama_vaksin }}" readonly>
               </div>

               <div class="mb-3">
                  <label class="form-label" for="nomor-batch">Nomor Batch</label>
                  <input type="text" class="form-control" id="nomor-batch" value="{{ $vaksin->nomor_batch }}" readonly>
               </div>
            </div>
            <div class="col-xl-6 col-sm-12">
               
               <div class="mb-3">
                  <label class="form-label" for="produsen">Produsen</label>
                  <input type="text" class="form-control" id="produsen" value="{{ $vaksin->produsen }}" readonly>
               </div>

               <div class="mb-3">
                  <label class="form-label" for="tanggal_kedaluwarsa">tanggal_kedaluwarsa</label>
                  <input type="text" class="form-control" id="tanggal_kedaluwarsa"
                     value="{{ \Carbon\Carbon::parse($vaksin->tanggal_kedaluwarsa)->isoFormat('LL') }}" readonly>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection