@extends('dashboard.app')

@section('title', 'Detail Provinsi')

@section('breadcrumbTitle', 'Provinsi')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('provinsi.index') }}">List Provinsi</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-5">
   <div class="card">
      <div class="card-body">
         <div class="card-title">
            <h4 class="card-title">DETAIL PROVINSI</h4>
         </div>
         <div class="row mb-4">
            <label for="nama-provinsi" class="col-sm-3 col-form-label">Nama Provinsi</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-provinsi" value="{{ $provinsi->nama_provinsi }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="kode-provinsi" class="col-sm-3 col-form-label">Kode Provinsi</label>
            <div class="col-sm-9">
               <input type="email" class="form-control" id="kode-provinsi" value="{{ $provinsi->kode_provinsi }}" readonly>
            </div>
         </div>

         <a href="{{ route('provinsi.index') }}" class="btn btn-primary w-md"><i class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
   </div>
</div>

{{-- DATA KABUPATEN --}}

<div class="col-xl-7">
   <div class="card">
      <div class="card-title">

         <button class="btn btn-primary float-start mt-3 ms-3" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#tambahKabupaten" aria-controls="tambahKabupaten"><i class="bx bxs-plus-square me-2"></i>
            Tambah Kabupaten
         </button>

         <div class="offcanvas offcanvas-end" tabindex="-1" id="tambahKabupaten" aria-labelledby="tambahKabupatenLabel">
            <div class="offcanvas-header border-bottom p-4">
               <h5 class="offcanvas-title" id="tambahKabupatenLabel">Tambah Kabupaten</h5>
               <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-4">
               <form action="{{ route('kabupaten.store') }}" method="POST">
                  @csrf
                  <input type="text" name="provinsi" value="{{ $provinsi->uuid }}" hidden>
                  <div class="mb-3">
                     <label class="form-label" for="nama-kabupaten">Nama Kabupaten</label>
                     <input type="text" class="form-control" id="nama-kabupaten" name="nama_kabupaten" value="{{ old('nama_kabupaten') }}">

                     @error('nama_kabupaten')
                     <small class="text-danger">{{ $message }}</small>
                     @enderror
                  </div>

                  <div class="mb-3">
                     <label class="form-label" for="kode-kabupaten">Kode Kabupaten</label>
                     <input type="number" class="form-control" id="kode-kabupaten" name="kode_kabupaten" value="{{ old('kode_kabupaten') }}">

                     @error('kode_kabupaten')
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
                  <th>Nama Kabupaten</th>
                  <th>Kode Kabupaten</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($provinsi->kabupatens as $kabupaten)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kabupaten->nama_kabupaten }}</td>
                  <td>{{ $kabupaten->kode_kabupaten }}</td>
                  <td>
                     <ul>
                        <a href="{{ route('kabupaten.show', $kabupaten->uuid) }}" class="btn btn-sm btn-info"><i
                              class="ti-info-alt"></i></a>
                        <a href="{{ route('kabupaten.edit', $kabupaten->uuid) }}" class="btn btn-sm btn-warning"><i
                              class="ti-pencil-alt"></i></a>
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#hapusKabupaten-{{ $kabupaten->uuid }}" aria-controls="hapusKabupaten"><i
                              class="ti-trash"></i>
                        </button>


                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusKabupaten-{{ $kabupaten->uuid }}"
                           aria-labelledby="hapusKabupatenLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="hapusKabupatenLabel">Hapus Kabupaten</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                 aria-label="Close"></button>
                           </div>

                           <div class="offcanvas-body p-4">
                              <form action="{{ route('kabupaten.destroy', $kabupaten->uuid) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <div class="mb-3">
                                    <span class="fs-6">Hapus {{ $kabupaten->nama_kabupaten }}?</span>
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