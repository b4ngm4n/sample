@extends('dashboard.app')

@section('title', 'Jenis Imunisasi')

@section('breadcrumbTitle', 'Jenis Imunisasi')

@section('breadcrumbActive', 'List Jenis Imunisasi')

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-title">
         <h4 class="title ms-4 mt-4 float-start">List Jenis Imunisasi</h4>
         @can('permission', 'create-jenis-pelayanan')
         <a href="{{ route('jenis-pelayanan.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Jenis Imunisasi</a>
         @endcan
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Imunisasi</th>
                  <th>Tahun Imunisasi</th>
                  <th>Pos Imunisasi</th>
                  <th>Vaksin</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($jenisImunisasis as $jenisImunisasi)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $jenisImunisasi->nama_pelayanan }}</td>
                  <td>{{ $jenisImunisasi->tahun ?? '-' }}</td>
                  <td>{{ $jenisImunisasi->pos_pelayanans_count }}</td>
                  <td>{{ $jenisImunisasi->vaksins_count }}</td>
                  <td>
                     <ul>
                        @can('permission', 'read-jenis-pelayanan')
                        <a href="{{ route('jenis-pelayanan.show', $jenisImunisasi->uuid) }}"
                           class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail Jenis Imunisasi"><i class="ti-info-alt"></i></a>
                        @endcan

                        @can('permission', 'edit-jenis-pelayanan')
                        <a href="{{ route('jenis-pelayanan.edit', $jenisImunisasi->uuid) }}"
                           class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Jenis Imunisasi"><i class="ti-pencil-alt"></i></a>
                        @endcan

                        @can('permission', 'delete-jenis-pelayanan')
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#jenisImunisasi-{{ $jenisImunisasi->uuid }}"
                           aria-controls="jenisImunisasi"><i class="ti-trash"></i>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1"
                           id="jenisImunisasi-{{ $jenisImunisasi->uuid }}" aria-labelledby="jenisImunisasiLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="jenisImunisasiLabel">Hapus Jenis Imunisasi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                 aria-label="Close"></button>
                           </div>

                           <div class="offcanvas-body p-4">
                              <form action="{{ route('jenis-pelayanan.destroy', $jenisImunisasi->uuid) }}"
                                 method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <div class="mb-3">
                                    <span class="fs-6">Hapus {{ $jenisImunisasi->nama_pelayanan . ' | Tahun ' .
                                       $jenisImunisasi->tahun }}?</span>
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