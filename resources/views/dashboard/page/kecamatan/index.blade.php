@extends('dashboard.app')

@section('title', 'Kecamatan')

@section('breadcrumbTitle', 'Kecamatan')

@section('breadcrumbActive', 'List Kecamatan')

@section('content')

<div class="col-12">
   <div class="card">

      <div class="card-title">
         <h4 class="title ms-4 mt-4 float-start">List Kecamatan</h4>
         @can('permission', 'create-kecamatan')
         <a href="{{ route('kecamatan.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Kecamatan</a>
               @endcan
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Kecamatan</th>
                  <th>Kode Kecamatan</th>
                  <th>Kabupaten</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($kecamatans as $kecamatan)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kecamatan->nama_kecamatan }}</td>
                  <td>{{ $kecamatan->kode_kecamatan }}</td>
                  <td><a href="{{ route('kabupaten.show', $kecamatan->kabupaten->uuid) }}">{{
                        $kecamatan->kabupaten->nama_kabupaten }}</a></td>
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