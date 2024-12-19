@extends('dashboard.app')

@section('title', 'Detail Jenis Pelayanan')

@section('breadcrumbTitle', 'Jenis Pelayanan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('jenis-pelayanan.index') }}">List Jenis Pelayanan</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-12">
   <div class="card">
      <div class="card-title mt-4 ms-4 me-4">
         <h4 class="card-title float-start">DETAIL JENIS PELAYANAN</h4>

         <a href="{{ route('jenis-pelayanan.index') }}" class="btn btn-primary w-md float-end"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
      <div class="card-body">

         <div class="row mb-4">
            <label for="nama-pelayanan" class="col-sm-3 col-form-label">Nama Pelayanan</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-pelayanan" value="{{ $jenisPelayanan->nama_pelayanan }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="tahun" class="col-sm-3 col-form-label">Tahun</label>
            <div class="col-sm-9">
               <input type="number" class="form-control" id="tahun" value="{{ $jenisPelayanan->tahun }}"
                  readonly>
            </div>
         </div>

      </div>
   </div>
</div>

{{-- DATA VAKSIN --}}
<div class="col-xl-12">
   <div class="card">
      <div class="card-title mt-4 ms-4 me-4">
         <h4 class="card-title float-start">List Data Vaksin</h4>

         <a href="{{ route('vaksin.index') }}" class="btn btn-primary w-md float-end"><i
               class="bx bxs-hand-right me-3"></i>Lihat Data Vaksin</a>
      </div>
      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Vaksin</th>
                  <th>Nomor Batch</th>
                  <th>Tanggal Kedaluwarsa</th>
                  <th>Produsen</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($jenisPelayanan->vaksins as $vaksin)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ Str::upper($vaksin?->nama_vaksin) }}</td>
                  <td>{{ $vaksin?->nomor_batch }}</td>
                  <td>{{ \Carbon\Carbon::parse($vaksin?->tanggal_kedaluwarsa)->isoFormat('LLLL') }}</td>
                  <td>{{ $vaksin->produsen ?? '-' }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

{{-- DATA POS PELAYANAN --}}
<div class="col-xl-12">
   <div class="card">
      <div class="card-title mt-4 ms-4 me-4">
         <h4 class="card-title float-start">List Pos Pelayanan</h4>

         <a href="{{ route('pos-pelayanan.index') }}" class="btn btn-primary w-md float-end"><i
               class="bx bxs-hand-right me-3"></i>Lihat Pos Pelayanan</a>
      </div>
      <div class="card-body">
         <table id="datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Pos Pelayanan</th>
                  <th>Puskesmas</th>
                  <th>Kelurahan</th>
                  <th>Alamat</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($jenisPelayanan->posPelayanans as $posPelayanan)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $posPelayanan?->nama_pos_pelayanan }}</td>
                  <td>{{ $posPelayanan->puskesmas?->nama_puskesmas }}</td>
                  <td>{{ $posPelayanan->kelurahan?->nama_kelurahan }}</td>
                  <td>{{ $posPelayanan->alamat }}</td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection