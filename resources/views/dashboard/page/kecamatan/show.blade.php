@extends('dashboard.app')

@section('title', 'Detail Kecamatan')

@section('breadcrumbTitle', 'Kecamatan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kecamatan.index') }}">List kecamatan</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-6">
   <div class="card">
      <div class="card-body">
         <div class="card-title">
            <h4 class="card-title">DETAIL KECAMATAN</h4>
         </div>
         <div class="row mb-4">
            <label for="nama-kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-kabupaten"
                  value="{{ $kecamatan->kabupaten->nama_kabupaten }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="nama-kecamatan" class="col-sm-3 col-form-label">Nama Kecamatan</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-kecamatan" value="{{ $kecamatan->nama_kecamatan }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="kode-kecamatan" class="col-sm-3 col-form-label">Kode Kecamatan</label>
            <div class="col-sm-9">
               <input type="email" class="form-control" id="kode-kecamatan" value="{{ $kecamatan->kode_kecamatan }}"
                  readonly>
            </div>
         </div>

         <a href="{{ route('kecamatan.index') }}" class="btn btn-primary w-md"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
   </div>
</div>

{{-- DATA KELURAHAN --}}
<div class="col-xl-6">
   <div class="card">
      <div class="card-title">

         <button class="btn btn-primary float-start mt-3 ms-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#tambahKelurahan" aria-controls="tambahKelurahan"><i class="bx bxs-plus-square me-2"></i>
            Tambah Kelurahan
         </button>

         <div class="offcanvas offcanvas-end" tabindex="-1" id="tambahKelurahan" aria-labelledby="tambahKelurahanLabel">
            <div class="offcanvas-header border-bottom p-4">
               <h5 class="offcanvas-title" id="tambahKelurahanLabel">Tambah Kecamatan</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-4">
               <form action="{{ route('kelurahan.store') }}" method="POST">
                  @csrf
                  <input type="text" name="kecamatan" value="{{ $kecamatan->uuid }}" hidden>
                  <div class="mb-3">
                     <label class="form-label" for="nama-kelurahan">Nama Kelurahan</label>
                     <input type="text" class="form-control" id="nama-kelurahan" name="nama_kelurahan"
                        value="{{ old('nama_kelurahan') }}">

                     @error('nama_kelurahan')
                     <small class="text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="mb-3">
                     <label class="form-label" for="kode-kelurahan">Kode Kelurahan</label>
                     <input type="number" class="form-control" id="kode-kelurahan" name="kode_kelurahan"
                        value="{{ old('kode_kelurahan') }}">

                     @error('kode_kelurahan')
                     <small class="text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="mt-4">
                     <button type="submit" class="btn btn-primary w-md">Simpan</button>
                  </div>
               </form>
            </div>
         </div>

      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Kelurahan</th>
                  <th>Kode Kelurahan</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($kecamatan->kelurahans as $kelurahan)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kelurahan->nama_kelurahan }}</td>
                  <td>{{ $kelurahan->kode_kelurahan }}</td>
                  <td>
                     <ul>
                        <a href="{{ route('kelurahan.show', $kelurahan->uuid) }}" class="btn btn-sm btn-info"><i
                              class="ti-info-alt"></i></a>
                        <a href="{{ route('kelurahan.edit', $kelurahan->uuid) }}" class="btn btn-sm btn-warning"><i
                              class="ti-pencil-alt"></i></a>
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#hapusKelurahan-{{ $kelurahan->uuid }}" aria-controls="hapusKelurahan"><i
                              class="ti-trash"></i>
                        </button>


                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusKelurahan-{{ $kelurahan->uuid }}"
                           aria-labelledby="hapusKelurahanLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="hapusKelurahanLabel">Hapus Kelurahan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                 aria-label="Close"></button>
                           </div>

                           <div class="offcanvas-body p-4">
                              <form action="{{ route('kelurahan.destroy', $kelurahan->uuid) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <div class="mb-3">
                                    <span class="fs-6">Hapus {{ $kelurahan->nama_kelurahan }}?</span>
                                 </div>

                                 <div class="mt-4">
                                    <button type="submit" class="btn btn-danger w-md">Hapus</button>
                                 </div>
                              </form>
                           </div>
                        </div>

                     </ul>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection