@extends('dashboard.app')

@section('title', 'Detail Puskesmas')

@section('breadcrumbTitle', 'Puskesmas')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('puskesmas.index') }}">List Puskesmas</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-6">
   <div class="card">
      <div class="card-title m-4">
         <h4 class="card-title float-start">DETAIL PUSKESMAS</h4>

         <a href="{{ route('puskesmas.index') }}" class="btn btn-primary w-md float-end"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
      <div class="card-body">
         <div class="row mb-4">
            <label for="nama-puskesmas" class="col-sm-3 col-form-label">Nama Puskesmas</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-puskesmas" value="{{ $puskesmas->nama_puskesmas }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="kode-puskesmas" class="col-sm-3 col-form-label">Kode puskesmas</label>
            <div class="col-sm-9">
               <input type="email" class="form-control" id="kode-puskesmas" value="{{ $puskesmas->kode_puskesmas }}"
                  readonly>
            </div>
         </div>

      </div>
   </div>
</div>

{{-- DATA WILAYAH KERJA --}}
<div class="col-xl-6">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('puskesmas.wilayah-kerja', $puskesmas->uuid) }}" method="post">
            @csrf
            <div class="d-flex justify-content-between card-title mb-4">
               <h4 class="card-title float-start">WILAYAH KERJA</h4>
      
               <div>
                  <button class="btn btn-primary w-20" type="submit"><i class="ti-save me-2"></i>Simpan</button>
               </div>
            </div>

            <div class="row">
               @foreach ($kelurahans as $name => $key)
               <div class="col-xl-6">
                  <div class="form-check">
                     <input class="form-check-input" type="checkbox" value="{{ $key }}" id="kelurahan-{{ $key }}"
                        name="wilayah[]" multiple {{ $puskesmas->wilayah_kerja->contains(fn($item) => $item->uuid ===
                     $key) ? 'checked' : '' }}>
                     <label class="form-check-label ms-2" for="kelurahan-{{ $key }}">{{ $name }}</label>
                  </div>
               </div>
               @endforeach
            </div>

         </form>
      </div>
   </div>
</div>



@endsection