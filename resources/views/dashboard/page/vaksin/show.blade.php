@extends('dashboard.app')

@section('title', 'Detail vaksin')

@section('breadcrumbTitle', 'vaksin')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('vaksin.index') }}">List vaksin</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-7">
   <div class="card">
      <div class="card-title m-4">
         <h4 class="card-title float-start">Detail Vaksin</h4>

         <a href="{{ route('vaksin.index') }}" class="btn btn-primary w-md float-end"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>
      <div class="card-body">
         <div class="row mb-4">
            <label for="nama-vaksin" class="col-sm-3 col-form-label">Nama Vaksin</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="nama-vaksin" value="{{ $vaksin->nama_vaksin }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="urutan-vaksin" class="col-sm-3 col-form-label">Urutan Vaksin</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="urutan-vaksin" value="{{ $vaksin->urutan_vaksin }}" readonly>
            </div>
         </div>
         <div class="row mb-4">
            <label for="produsen" class="col-sm-3 col-form-label">Produsen</label>
            <div class="col-sm-9">
               <input type="text" class="form-control" id="produsen" value="{{ $vaksin->produsen }}" readonly>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="col-xl-5 ">
   {{-- STORE STOK VAKSIN --}}
   <div class="card">
      <div class="card-body">
         <form action="{{ route('vaksin.store-stok-vaksin', $vaksin->uuid) }}" method="post">
            @csrf
            <div class="d-flex justify-content-between card-title mb-4">
               <h4 class="card-title float-start">Tambah Stok Vaksin</h4>
               @can('permission', 'store-stok-vaksin')
               <div>
                  <button class="btn btn-primary w-20" type="submit"><i class="ti-save me-2"></i>Simpan</button>
               </div>
               @endcan
            </div>

            <div class="row">
               <div class="mb-3">
                  <label for="kode_batch">Kode Batch</label>
                  <input type="text" class="form-control" id="kode_batch" name="kode_batch" placeholder="F123">
               </div>
               <div class="mb-3">
                  <label for="tanggal_produksi">Tanggal Produksi</label>
                  <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi">
               </div>
               <div class="mb-3">
                  <label for="expired_date">Tanggal Expired</label>
                  <input type="date" class="form-control" id="expired_date" name="expired_date">
               </div>
               <div class="mb-3">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="F123">
               </div>
               <div class="mb-3">
                  <label for="satuan">Satuan</label>
                  <select class="select2 form-control select2-multiple" name="kategori[]" multiple="multiple"
                     data-placeholder="Pilih Satuan ...">
                     <option value="vaial">Vial</option>
                     <option value="ampul">Ampul</option>
                  </select>
               </div>

            </div>
         </form>
      </div>
   </div>
</div>

{{-- LIST STOK --}}
<div class="col-12">
   <div class="card">
      <div class="card-title">
         <h4 class="title ms-4 mt-4 mb-0 float-start">List Stok Vaksin</h4>
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Kode Batch</th>
                  <th>Tanggal Produksi</th>
                  <th>Tanggal Expired</th>
                  <th>Jumlah</th>
                  <th>Satuan</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($vaksin->stokVaksin as $stokVaksin)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $stokVaksin->kode_batch }}</td>
                  <td>{{ \Carbon\Carbon::parse($stokVaksin->tanggal_produksi)->isoFormat('LLLL') }}</td>
                  <td>{{ \Carbon\Carbon::parse($stokVaksin->tanggal_expired)->isoFormat('LLLL') }}</td>
                  <td>{{ $stokVaksin->jumlah }}</td>
                  <td>{{ $stokVaksin->satuan }}</td>
                  <td>
                     @can('permission', 'delete-wilayah-kerja')
                     <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#hapusStokVaksin-{{ $stokVaksin->uuid }}" aria-controls="hapusStokVaksin"><i
                           class="ti-trash"></i>
                     </button>

                     <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusStokVaksin-{{ $stokVaksin->uuid }}"
                        aria-labelledby="hapusStokVaksinLabel">
                        <div class="offcanvas-header border-bottom p-4">
                           <h5 class="offcanvas-title" id="hapusStokVaksinLabel">Hapus Stok Vaksin</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                              aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body p-4">
                           <form action="{{ route('vaksin.destroy-stok-vaksin', $stokVaksin->uuid) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="mb-3">
                                 <span class="fs-6">Hapus {{ $stokVaksin->kode_batch }}?</span>
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


{{-- LIST KATEGORI --}}
<div class="col-8">
   <div class="card">
      <div class="card-title">
         <h4 class="title ms-4 mt-4 mb-0 float-start">List Kategori</h4>
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Jenis Kategori</th>
                  <th>Status Kategori</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($vaksin->kategoris as $kategori)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kategori->nama_kategori }}</td>
                  <td><span class="badge bg-primary">{{ Str::upper($kategori->jenis_kategori) }}</span></td>
                  <td><span class="badge bg-success">{{ Str::upper($kategori->status_kategori) }}</span></td>
                  <td>
                     @can('permission', 'delete-wilayah-kerja')
                     <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#hapusKategori-{{ $kategori->uuid }}" aria-controls="hapusKategori"><i
                           class="ti-trash"></i>
                     </button>

                     <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusKategori-{{ $kategori->uuid }}"
                        aria-labelledby="hapusKategoriLabel">
                        <div class="offcanvas-header border-bottom p-4">
                           <h5 class="offcanvas-title" id="hapusKategoriLabel">Hapus Kategori</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                              aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body p-4">
                           <form
                              action="{{ route('vaksin.destroy-kategori-vaksin', ['vaksin' => $vaksin->uuid, 'kategori' => $kategori->uuid] ) }}"
                              method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="mb-3">
                                 <span class="fs-6">Hapus {{ $kategori->nama_kategori }}?</span>
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

<div class="col-4">
   {{-- STORE KATEGORI --}}
   <div class="card">
      <div class="card-body">
         <form action="{{ route('vaksin.store-kategori-vaksin', $vaksin->uuid) }}" method="post">
            @csrf
            <div class="d-flex justify-content-between card-title mb-4">

               <h4 class="card-title float-start">Pilih Kategori</h4>
               @can('permission', 'store-kategori-vaksin')
               <div>
                  <button class="btn btn-primary w-20" type="submit"><i class="ti-save me-2"></i>Simpan</button>
               </div>
               @endcan
            </div>

            <div class="row">
               <select class="select2 form-control select2-multiple" name="kategori[]" multiple="multiple"
                  data-placeholder="Pilih Kategori ...">
                  @foreach ($kategoris as $kategori)
                  @if (!$vaksin->kategoris->contains(fn($item) => $item->id === $kategori->id))
                  <option value="{{ $kategori->uuid }}">{{ $kategori->nama_kategori }}</option>
                  @endif
                  @endforeach
               </select>
            </div>
         </form>
      </div>
   </div>

</div>


@endsection