@extends('dashboard.app')

@section('title', 'Pos Pelayanan')

@section('breadcrumbTitle', 'Pos Pelayanan')

@section('breadcrumbActive', 'List Pos Pelayanan')

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-title">
      <a href="{{ route('pos-pelayanan.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
          class="bx bxs-plus-square me-2"></i>Tambah Pos Pelayanan</a>
    </div>
    <div class="card-body">

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap data-table-area">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pos</th>
            <th>Puskesmas</th>
            <th>Kelurahan</th>
            <th>Alamat</th>
            <th>Jenis Pelayanan</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          @foreach ($posPelayanans as $posPelayanan)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $posPelayanan->nama_pos_pelayanan }}</td>
            <td>{{ $posPelayanan->puskesmas->nama_puskesmas }}</td>
            <td>{{ $posPelayanan->kelurahan->nama_kelurahan }}</td>
            <td>{{ $posPelayanan->alamat }}</td>
            <td>{{ $posPelayanan->jenisPelayanan->nama_pelayanan }}</td>
            <td>
              <ul>

                @can('permission', 'read-pos-pelayanan')
                <a href="{{ route('pos-pelayanan.show', $posPelayanan->uuid) }}" class="btn btn-sm btn-info"><i
                    class="ti-info-alt"></i></a>
                @endcan

                @can('permission', 'edit-pos-pelayanan')
                <a href="{{ route('pos-pelayanan.edit', $posPelayanan->uuid) }}" class="btn btn-sm btn-warning"><i
                    class="ti-pencil-alt"></i></a>
                @endcan

                @can('permission', 'delete-pos-pelayanan')
                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#hapusPosPelayanan-{{ $posPelayanan->uuid }}" aria-controls="hapusPosPelayanan"><i
                    class="ti-trash"></i>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusPosPelayanan-{{ $posPelayanan->uuid }}"
                  aria-labelledby="hapusPosPelayananLabel">
                  <div class="offcanvas-header border-bottom p-4">
                    <h5 class="offcanvas-title" id="hapusPosPelayananLabel">Hapus Pos Pelayanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>

                  <div class="offcanvas-body p-4">
                    <form action="{{ route('pos-pelayanan.destroy', $posPelayanan->uuid) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="mb-3">
                        <span class="fs-6">Hapus {{ $posPelayanan->nama_pos_pelayanan }}?</span>
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