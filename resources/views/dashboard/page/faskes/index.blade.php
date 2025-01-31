@extends('dashboard.app')

@section('title', 'Faskes')

@section('breadcrumbTitle', 'Faskes')

@section('breadcrumbActive', 'List faskes')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-title">
         <h4 class="title ms-4 mt-4 float-start">List Faskes</h4>
         @can('permission', 'create-faskes')
         <a href="{{ route('faskes.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Faskes</a>
         @endcan
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive table-striped table-bordered data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Faskes</th>
                  <th>Kode Faskes</th>
                  <th>Jenis Faskes</th>
                  <th>Tingkatan</th>
                  <th>Alamat</th>
                  <th>Wilayah Kerja</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($dataFaskes as $faskes)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $faskes->nama_faskes }}</td>
                  <td>{{ $faskes->kode_faskes }}</td>
                  <td><span class="badge bg-primary">{{ $faskes->jenis_faskes }}</span></td>
                  <td>{{ $faskes->depth }}</td>
                  <td>
                     <ul class="d-flex flex-column gap-1">
                        @foreach ($faskes->alamat as $alamat)
                        <li>{{ $alamat->jalan . ', ' . $alamat->wilayah->nama_wilayah . ', ' . $alamat->wilayah->parent->nama_wilayah }}</li>
                        @endforeach
                     </ul>
                  </td>
                  <td>{{ $faskes->wilayah_kerja_count }}</td>
                  <td>
                     <ul class="d-flex flex-row gap-2">
                        @can('permission', 'read-faskes')
                        <a href="{{ route('faskes.show', $faskes->uuid) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail Faskes"><i
                            class="ti-info-alt"></i></a>
                        @endcan
        
                        @can('permission', 'edit-faskes')
                        <a href="{{ route('faskes.edit', $faskes->uuid) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Faskes"><i
                            class="ti-pencil-alt"></i></a>
                        @endcan
        
                        @can('permission', 'delete-faskes')
                        <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#hapusFaskes-{{ $faskes->uuid }}" aria-controls="hapusFaskes"><i class="ti-trash"></i>
                        </button>
        
                        <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusFaskes-{{ $faskes->uuid }}"
                          aria-labelledby="hapusFaskesLabel">
                          <div class="offcanvas-header border-bottom p-4">
                            <h5 class="offcanvas-title" id="hapusFaskesLabel">Hapus Faskes</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
        
                          <div class="offcanvas-body p-4">
                            <form action="{{ route('faskes.destroy', $faskes->uuid) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="mb-3">
                                <span class="fs-6">Hapus {{ $faskes->nama_faskes }}?</span>
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