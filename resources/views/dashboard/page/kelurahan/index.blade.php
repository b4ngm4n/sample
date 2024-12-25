@extends('dashboard.app')

@section('title', 'Kelurahan')

@section('breadcrumbTitle', 'Kelurahan')

@section('breadcrumbActive', 'List Kelurahan')

@section('content')

<div class="col-12">
   <div class="card">
      @can('permission', 'create-kelurahan')
      <div class="card-title">
         <a href="{{ route('kelurahan.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Kelurahan</a>
      </div>
      @endcan
      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Kelurahan</th>
                  <th>Kode Kelurahan</th>
                  <th>Kecamatan</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($kelurahans as $kelurahan)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kelurahan->nama_kelurahan }}</td>
                  <td>{{ $kelurahan->kode_kelurahan }}</td>
                  <td>{{ $kelurahan->kecamatan->nama_kecamatan }}</td>
                  <td>
                     <ul>
                        @can('permission', 'read-kelurahan')
                        <a href="{{ route('kelurahan.show', $kelurahan->uuid) }}" class="btn btn-sm btn-info"><i
                              class="ti-info-alt"></i></a>
                        @endcan

                        @can('permission', 'edit-kelurahan')
                        <a href="{{ route('kelurahan.edit', $kelurahan->uuid) }}" class="btn btn-sm btn-warning"><i
                              class="ti-pencil-alt"></i></a>
                        @endcan

                        @can('permission', 'delete-kelurahan')
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                           data-bs-target="#hapusKelurahan-{{ $kelurahan->uuid }}" aria-controls="hapusKelurahan"><i
                              class="ti-trash"></i>
                        </button>
                        {{-- MODAL --}}
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusKelurahan-{{ $kelurahan->uuid }}"
                           aria-labelledby="hapusKelurahanLabel">
                           <div class="offcanvas-header border-bottom p-4">
                              <h5 class="offcanvas-title" id="hapusKelurahanLabel">Hapus kelurahan</h5>
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
                        {{-- END MODAL --}}
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