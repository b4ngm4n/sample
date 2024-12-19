@extends('dashboard.app')

@section('title', 'Puskesmas')

@section('breadcrumbTitle', 'Puskesmas')

@section('breadcrumbActive', 'List Puskesmas')

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-title">
      <a href="{{ route('puskesmas.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
          class="bx bxs-plus-square me-2"></i>Tambah Puskesmas</a>
    </div>
    <div class="card-body">

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap data-table-area">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Puskesmas</th>
            <th>Nama Puskesmas</th>
            <th>Status</th>
            <th>Kecamatan</th>
            <th>Wilayah Kerja</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          @foreach ($listpuskes as $puskesmas)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $puskesmas->kode_puskesmas }}</td>
            <td>{{ $puskesmas->nama_puskesmas }}</td>
            <td><span class="badge bg-{{ $puskesmas->status_puskesmas == 'aktif' ? 'primary' : 'secondary' }}">{{
                Str::upper($puskesmas->status_puskesmas) }}</span></td>
            <td><a href="{{ route('kecamatan.show', $puskesmas->kecamatan->uuid)  }}">{{
                $puskesmas->kecamatan->nama_kecamatan }}</a></td>
            <td>{{ $puskesmas->wilayah_kerja_count }}</td>
            <td>
              <ul>

                @can('permission', 'read-puskesmas')
                <a href="{{ route('puskesmas.show', $puskesmas->uuid) }}" class="btn btn-sm btn-info"><i
                    class="ti-info-alt"></i></a>
                @endcan

                @can('permission', 'edit-puskesmas')
                <a href="{{ route('puskesmas.edit', $puskesmas->uuid) }}" class="btn btn-sm btn-warning"><i
                    class="ti-pencil-alt"></i></a>
                @endcan

                @can('permission', 'delete-puskesmas')
                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#hapusPuskesmas-{{ $puskesmas->uuid }}" aria-controls="hapusPuskesmas"><i
                    class="ti-trash"></i>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusPuskesmas-{{ $puskesmas->uuid }}"
                  aria-labelledby="hapusPuskesmasLabel">
                  <div class="offcanvas-header border-bottom p-4">
                    <h5 class="offcanvas-title" id="hapusPuskesmasLabel">Hapus Puskesmas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>

                  <div class="offcanvas-body p-4">
                    <form action="{{ route('puskesmas.destroy', $puskesmas->uuid) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="mb-3">
                        <span class="fs-6">Hapus {{ $puskesmas->nama_puskesmas }}?</span>
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