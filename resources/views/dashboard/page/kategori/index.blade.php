@extends('dashboard.app')

@section('title', 'Kategori')

@section('breadcrumbTitle', 'List Kategori')

@section('breadcrumbActive', 'List Kategori')

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-title">
      <h4 class="title ms-4 mt-4 float-start">List kategori</h4>
      @can('permission', 'create-kategori')
      <a href="{{ route('kategori.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
          class="bx bxs-plus-square me-2"></i>Tambah kategori</a>
      @endcan
    </div>
    <div class="card-body">

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap data-table-area">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama kategori</th>
            <th>Slug</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          @foreach ($kategoris as $kategori)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
            <td>{{ $kategori->slug }}</td>
            <td><span class="badge bg-primary">{{ Str::upper($kategori->jenis_kategori) }}</span></td>
            <td><span class="badge bg-success">{{ Str::upper($kategori->status_kategori) }}</span></td>
            <td>{{ $kategori->keterangan }}</td>
            <td>
              <ul>
                
                @can('permission', 'edit-kategori')
                <a href="{{ route('kategori.edit', $kategori->uuid) }}" class="btn btn-sm btn-warning"
                  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit kategori"><i
                    class="ti-pencil-alt"></i></a>
                @endcan

                @can('permission', 'delete-kategori')
                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#hapusKategori-{{ $kategori->uuid }}" aria-controls="hapusKategori"><i class="ti-trash"></i>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusKategori-{{ $kategori->uuid }}"
                  aria-labelledby="hapusKategoriLabel">
                  <div class="offcanvas-header border-bottom p-4">
                    <h5 class="offcanvas-title" id="hapusKategoriLabel">Hapus Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>

                  <div class="offcanvas-body p-4">
                    <form action="{{ route('kategori.destroy', $kategori->uuid) }}" method="POST">
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