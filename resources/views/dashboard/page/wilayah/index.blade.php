@extends('dashboard.app')

@section('title', 'Wilayah')

@section('breadcrumbTitle', 'Wilayah')

@section('breadcrumbActive', 'List Wilayah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-title">
         <h4 class="title ms-4 mt-4 float-start">List Wilayah</h4>
         @can('permission', 'create-wilayah')
         <a href="{{ route('wilayah.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Wilayah</a>
         @endcan
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
                  <th>Tingkatan</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @forelse ($wilayahs as $wilayah)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $wilayah->nama_wilayah }}</td>
                  <td>{{ $wilayah->kode_wilayah }}</td>
                  <td><span class="badge bg-primary">{{ $wilayah->jenis_wilayah }}</span></td>
                  <td>{{ $wilayah->depth }}</td>
                  <td>
                     <ul>
                        @can('permission', 'read-wilayah')
                        <a href="{{ route('wilayah.show', $wilayah->uuid) }}" class="btn btn-sm btn-info"
                           data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail wilayah"><i
                              class="ti-info-alt"></i></a>
                        @endcan

                        @can('permission', 'edit-wilayah')
                        <a href="{{ route('wilayah.edit', $wilayah->uuid) }}" class="btn btn-sm btn-warning"
                           data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit wilayah"><i
                              class="ti-pencil-alt"></i></a>
                        @endcan

                        @can('permission', 'delete-wilayah')
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#hapusWilayah-{{ $wilayah->uuid }}" aria-controls="hapusWilayah"><i
                              class="ti-trash"></i>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusWilayah-{{ $wilayah->uuid }}"
                           aria-labelledby="hapusWilayahLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="hapusWilayahLabel">Hapus wilayah</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                 aria-label="Close"></button>
                           </div>

                           <div class="offcanvas-body p-4">
                              <form action="{{ route('wilayah.destroy', $wilayah->uuid) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <div class="mb-3">
                                    <span class="fs-6">Hapus {{ $wilayah->nama_wilayah }}?</span>
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
               @empty
               <tr>
                  <td>Data Tidak Tersedia</td>
               </tr>
               @endforelse
            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection