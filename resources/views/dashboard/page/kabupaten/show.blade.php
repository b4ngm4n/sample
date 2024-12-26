@extends('dashboard.app')

@section('title', 'Detail Kabupaten')

@section('breadcrumbTitle', 'Kabupaten')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kabupaten.index') }}">List Kabupaten</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-6">
   <div class="card">
      <div class="card-body">
         <div class="card-title">
            <h4 class="card-title">Detail Kabupaten</h4>
         </div>
         <div class="row mb-4">
            <label for="nama-provinsi" class="col-sm-3 col-form-label">Provinsi</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-provinsi"
                  value="{{ $kabupaten->provinsi->nama_provinsi }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="nama-kabupaten" class="col-sm-3 col-form-label">Nama Kabupaten</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-kabupaten" value="{{ $kabupaten->nama_kabupaten }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="kode-kabupaten" class="col-sm-3 col-form-label">Kode Kabupaten</label>
            <div class="col-sm-9">
               <input type="email" class="form-control" id="kode-kabupaten" value="{{ $kabupaten->kode_kabupaten }}"
                  readonly>
            </div>
         </div>

         <a href="{{ route('kabupaten.index') }}" class="btn btn-primary w-md"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
   </div>
</div>

{{-- DATA KECAMATAN --}}
<div class="col-xl-6">
   <div class="card">
      <div class="card-title">

         @can('permission', 'create-kecamatan')
         <button class="btn btn-primary float-start mt-3 ms-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#tambahKecamatan" aria-controls="tambahKecamatan"><i class="bx bxs-plus-square me-2"></i>
            Tambah Kecamatan
         </button>

         <div class="offcanvas offcanvas-end" tabindex="-1" id="tambahKecamatan" aria-labelledby="tambahKecamatanLabel">
            <div class="offcanvas-header border-bottom p-4">
               <h5 class="offcanvas-title" id="tambahKecamatanLabel">Tambah Kecamatan</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-4">
               <form action="{{ route('kecamatan.store') }}" method="POST">
                  @csrf
                  <input type="text" name="kabupaten" value="{{ $kabupaten->uuid }}" hidden>
                  <div class="mb-3">
                     <label class="form-label" for="nama-kecamatan">Nama Kabupaten</label>
                     <input type="text" class="form-control" id="nama-kecamatan" name="nama_kecamatan"
                        value="{{ old('nama_kecamatan') }}">

                     @error('nama_kecamatan')
                     <small class="text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="mb-3">
                     <label class="form-label" for="kode-kecamatan">Kode Kabupaten</label>
                     <input type="number" class="form-control" id="kode-kecamatan" name="kode_kecamatan"
                        value="{{ old('kode_kecamatan') }}">

                     @error('kode_kecamatan')
                     <small class="text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  @can('permission', 'store-kecamatan')
                  <div class="mt-4">
                     <button type="submit" class="btn btn-primary w-md">Simpan</button>
                  </div>
                  @endcan
               </form>
            </div>
         </div>
         @endcan

         <h4 class="titile float-end mt-3 me-3">Data Kecamatan</h4>

      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Kecamatan</th>
                  <th>Kode Kecamatan</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($kabupaten->kecamatans as $kecamatan)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kecamatan->nama_kecamatan }}</td>
                  <td>{{ $kecamatan->kode_kecamatan }}</td>
                  <td>
                     <ul>
                        @can('permission', 'read-kecamatan')
                        <a href="{{ route('kecamatan.show', $kecamatan->uuid) }}" class="btn btn-sm btn-info"><i
                              class="ti-info-alt"></i></a>
                        @endcan

                        @can('permission', 'edit-kecamatan')
                        <a href="{{ route('kecamatan.edit', $kecamatan->uuid) }}" class="btn btn-sm btn-warning"><i
                              class="ti-pencil-alt"></i></a>
                        @endcan

                        @can('permission', 'delete-kecamatan')
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#hapusKecamatan-{{ $kecamatan->uuid }}" aria-controls="hapusKecamatan"><i
                              class="ti-trash"></i>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusKecamatan-{{ $kecamatan->uuid }}"
                           aria-labelledby="hapusKecamatanLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="hapusKecamatanLabel">Hapus Kecamatan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                 aria-label="Close"></button>
                           </div>

                           <div class="offcanvas-body p-4">
                              <form action="{{ route('kecamatan.destroy', $kecamatan->uuid) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <div class="mb-3">
                                    <span class="fs-6">Hapus {{ $kecamatan->nama_kecamatan }}?</span>
                                 </div>

                                 <div class="mt-4">
                                    <button type="submit" class="btn btn-danger w-md">Hapus</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                        @endcan

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