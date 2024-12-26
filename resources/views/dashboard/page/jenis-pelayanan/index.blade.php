@extends('dashboard.app')

@section('title', 'Jenis Pelayanan')

@section('breadcrumbTitle', 'Jenis Pelayanan')

@section('breadcrumbActive', 'List Jenis Pelayanan')

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-title">
         <h4 class="title ms-4 mt-4 float-start">List Jenis Pelayanan</h4>
         @can('permission', 'create-jenis-pelayanan')
         <a href="{{ route('jenis-pelayanan.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Jenis Pelayanan</a>
         @endcan
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Pelayanan</th>
                  <th>Tahun Pelayanan</th>
                  <th>Pos Pelayanan</th>
                  <th>Vaksin</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($jenisPelayanans as $jenisPelayanan)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $jenisPelayanan->nama_pelayanan }}</td>
                  <td>{{ $jenisPelayanan->tahun ?? '-' }}</td>
                  <td>{{ $jenisPelayanan->pos_pelayanans_count }}</td>
                  <td>{{ $jenisPelayanan->vaksins_count }}</td>
                  <td>
                     <ul>
                        @can('permission', 'read-jenis-pelayanan')
                        <a href="{{ route('jenis-pelayanan.show', $jenisPelayanan->uuid) }}"
                           class="btn btn-sm btn-info"><i class="ti-info-alt"></i></a>
                        @endcan

                        @can('permission', 'edit-jenis-pelayanan')
                        <a href="{{ route('jenis-pelayanan.edit', $jenisPelayanan->uuid) }}"
                           class="btn btn-sm btn-warning"><i class="ti-pencil-alt"></i></a>
                        @endcan

                        @can('permission', 'delete-jenis-pelayanan')
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#jenisPelayanan-{{ $jenisPelayanan->uuid }}"
                           aria-controls="jenisPelayanan"><i class="ti-trash"></i>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1"
                           id="jenisPelayanan-{{ $jenisPelayanan->uuid }}" aria-labelledby="jenisPelayananLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="jenisPelayananLabel">Hapus Jenis Pelayanan</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                 aria-label="Close"></button>
                           </div>

                           <div class="offcanvas-body p-4">
                              <form action="{{ route('jenis-pelayanan.destroy', $jenisPelayanan->uuid) }}"
                                 method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <div class="mb-3">
                                    <span class="fs-6">Hapus {{ $jenisPelayanan->nama_pelayanan . ' | Tahun ' .
                                       $jenisPelayanan->tahun }}?</span>
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