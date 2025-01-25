@extends('dashboard.app')

@section('title', 'Instansi')

@section('breadcrumbTitle', 'Instansi')

@section('breadcrumbActive', 'List instansi')

@section('content')

<div class="col-12">
  <div class="card">

    <div class="card-title">
      <h4 class="title ms-4 mt-4 float-start">List Instansi</h4>
      @can('permission', 'create-instansi')
      <a href="{{ route('instansi.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
          class="bx bxs-plus-square me-2"></i>Tambah Instansi</a>
      @endcan
    </div>

    <div class="card-body">

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap data-table-area">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Instansi</th>
            <th>Nama Instansi</th>
            <th>Status</th>
            <th>Kecamatan</th>
            <th>Wilayah Kerja</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          @foreach ($listpuskes as $instansi)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $instansi->kode_instansi }}</td>
            <td>{{ $instansi->nama_instansi }}</td>
            <td><span class="badge bg-{{ $instansi->status_instansi == 'aktif' ? 'primary' : 'secondary' }}">{{
                Str::upper($instansi->status_instansi) }}</span></td>
            <td><a href="{{ route('kecamatan.show', $instansi->kecamatan->uuid)  }}">{{
                $instansi->kecamatan->nama_kecamatan }}</a></td>
            <td>{{ $instansi->wilayah_kerja_count }}</td>
            <td>
              <ul>

                @can('permission', 'read-instansi')
                <a href="{{ route('instansi.show', $instansi->uuid) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Detail Instansi"><i
                    class="ti-info-alt"></i></a>
                @endcan

                @can('permission', 'edit-instansi')
                <a href="{{ route('instansi.edit', $instansi->uuid) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit Instansi"><i
                    class="ti-pencil-alt"></i></a>
                @endcan

                @can('permission', 'delete-instansi')
                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#hapusInstansi-{{ $instansi->uuid }}" aria-controls="hapusInstansi"><i
                    class="ti-trash"></i>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusInstansi-{{ $instansi->uuid }}"
                  aria-labelledby="hapusInstansiLabel">
                  <div class="offcanvas-header border-bottom p-4">
                    <h5 class="offcanvas-title" id="hapusInstansiLabel">Hapus Instansi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>

                  <div class="offcanvas-body p-4">
                    <form action="{{ route('instansi.destroy', $instansi->uuid) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="mb-3">
                        <span class="fs-6">Hapus {{ $instansi->nama_instansi }}?</span>
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