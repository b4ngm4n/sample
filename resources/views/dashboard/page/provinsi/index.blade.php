@extends('dashboard.app')

@section('title', 'Provinsi')

@section('breadcrumbTitle', 'Provinsi')

@section('breadcrumbActive', 'List Provinsi')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-title">
         <a href="{{ route('provinsi.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Provinsi</a>
      </div>
      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Provinsi</th>
                  <th>Kode Provinsi</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($provinsis as $provinsi)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $provinsi->nama_provinsi }}</td>
                  <td>{{ $provinsi->kode_provinsi }}</td>
                  <td>
                     <ul>
                        @can('permission', 'read-provinsi')
                        <a href="{{ route('provinsi.show', $provinsi->uuid) }}" class="btn btn-sm btn-info"><i
                              class="ti-info-alt"></i></a>
                        @endcan
                        <a href="{{ route('provinsi.edit', $provinsi->uuid) }}" class="btn btn-sm btn-warning"><i
                              class="ti-pencil-alt"></i></a>
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#hapusProvinsi-{{ $provinsi->uuid }}" aria-controls="hapusProvinsi"><i
                              class="ti-trash"></i>
                        </button>

                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusProvinsi-{{ $provinsi->uuid }}"
                           aria-labelledby="hapusProvinsiLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="hapusProvinsiLabel">Hapus Provinsi</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                 aria-label="Close"></button>
                           </div>

                           <div class="offcanvas-body p-4">
                              <form action="{{ route('provinsi.destroy', $provinsi->uuid) }}" method="POST">
                                 @csrf
                                 @method('DELETE')
                                 <div class="mb-3">
                                    <span class="fs-6">Hapus {{ $provinsi->nama_provinsi }}?</span>
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