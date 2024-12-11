@extends('dashboard.app')

@section('title', 'Kabupaten')

@section('breadcrumbTitle', 'Kabupaten')

@section('breadcrumbActive', 'List Kabupaten')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-title">
         <a href="{{ route('kabupaten.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Kabupaten</a>
      </div>
      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Kabupaten</th>
                  <th>Kode Kabupaten</th>
                  <th>Provinsi</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($kabupatens as $kabupaten)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kabupaten->nama_kabupaten }}</td>
                  <td>{{ $kabupaten->kode_kabupaten }}</td>
                  <td><a href="{{ route('provinsi.show', $kabupaten->provinsi->uuid) }}">{{ $kabupaten->provinsi->nama_provinsi }}</a></td>
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