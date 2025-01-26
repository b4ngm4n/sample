@extends('dashboard.app')

@section('title', 'Detail Faskes')

@section('breadcrumbTitle', 'Faskes')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('faskes.index') }}">List faskes</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-7">
   <div class="card">
      <div class="card-title m-4">
         <h4 class="card-title float-start">Detail Faskes</h4>

         <a href="{{ route('faskes.index') }}" class="btn btn-primary w-md float-end"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
      <div class="card-body">
         <div class="row mb-4">
            <label for="nama-faskes" class="col-sm-3 col-form-label">Nama Faskes</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-faskes" value="{{ $faskes->nama_faskes }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="kode-faskes" class="col-sm-3 col-form-label">Kode Faskes</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="kode-faskes" value="{{ $faskes->kode_faskes }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="status" class="col-sm-3 col-form-label">Status Faskes</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="status" value="{{ Str::upper($faskes->status_faskes) }}"
                  readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="alamat" class="col-sm-3 col-form-label">Jenis faskes</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="alamat" value="{{ $faskes->jenis_faskes }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="alamat" class="col-sm-3 col-form-label">Wilayah</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="alamat"
                  value="{{ $faskes->wilayah->nama_wilayah . ' - ' . $faskes->wilayah->kode_wilayah }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat Faskes</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="alamat"
                  value="{{ $faskes->alamat->pluck('jalan')->implode(', ') . ', ' . $faskes->alamat->pluck('wilayah.nama_wilayah')->implode(', ') . ', ' . $faskes->alamat->pluck('wilayah.parent.nama_wilayah')->implode(', ')}}"
                  readonly>
            </div>
         </div>

      </div>
   </div>
</div>

{{-- STORE WILAYAH KERJA --}}
<div class="col-xl-5">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('faskes.wilayah-kerja', $faskes->uuid) }}" method="post">
            @csrf
            <div class="d-flex justify-content-between card-title mb-4">

               <h4 class="card-title float-start">Pilih Wilayah Kerja</h4>
               @can('permission', 'store-wilayah-kerja-faskes')
               <div>
                  <button class="btn btn-primary w-20" type="submit"><i class="ti-save me-2"></i>Simpan</button>
               </div>
               @endcan
            </div>

            <div class="row">
               <select class="select2 form-control select2-multiple" name="wilayah[]" multiple="multiple"
                  data-placeholder="Pilih Wilayah Kerja ...">
                  @foreach ($wilayahs as $name => $key)
                     @if (!$faskes->wilayahKerja->contains(fn($item) => $item->wilayah->uuid === $key))
                        <option value="{{ $key }}">{{ $name }}</option>
                     @endif
                  @endforeach
               </select>
            </div>
         </form>
      </div>
   </div>
</div>


{{-- LIST WILAYAH KERJA --}}
<div class="col-12">
   <div class="card">
      <div class="card-title">
         <h4 class="title ms-4 mt-4 float-start">List Wilayah Kerja</h4>
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Wilayah</th>
                  <th>Kode Wilayah</th>
                  <th>Jenis Wilayah</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($faskes->wilayahKerja as $wilayahKerja)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $wilayahKerja->wilayah->nama_wilayah }}</td>
                  <td>{{ $wilayahKerja->wilayah->kode_wilayah }}</td>
                  <td><span class="badge bg-primary">{{ $wilayahKerja->wilayah->jenis_wilayah }}</span></td>
                  <td>
                     @can('permission', 'delete-wilayah-kerja')
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#hapusWilayahKerja-{{ $wilayahKerja->wilayah->uuid }}" aria-controls="hapusWilayahKerja"><i class="ti-trash"></i>
                        </button>
        
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusWilayahKerja-{{ $wilayahKerja->wilayah->uuid }}"
                          aria-labelledby="hapusWilayahKerjaLabel">
                          <div class="offcanvas-header border-bottom p-4">
                            <h5 class="offcanvas-title" id="hapusWilayahKerjaLabel">Hapus Wilayah Kerja</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
        
                          <div class="offcanvas-body p-4">
                            <form action="{{ route('faskes.destroy-wilayah-kerja', ['faskes' => $faskes->uuid, 'wilayah' => $wilayahKerja->wilayah->uuid]) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="mb-3">
                                <span class="fs-6">Hapus {{ $wilayahKerja->wilayah->nama_wilayah }}?</span>
                              </div>
        
                              <div class="mt-4">
                                <button type="submit" class="btn btn-danger w-md">Hapus</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        @endcan
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection