@extends('dashboard.app')

@section('title', 'Vaksin')

@section('breadcrumbTitle', 'Vaksin')

@section('breadcrumbActive', 'List Vaksin')

@section('content')

<div class="col-12">
  <div class="card">
    <div class="card-title">
      <a href="{{ route('vaksin.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
          class="bx bxs-plus-square me-2"></i>Tambah Vaksin</a>
    </div>
    <div class="card-body">

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap data-table-area">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Vaksin</th>
            <th>Nomor Batch</th>
            <th>Expired</th>
            <th>Produsen</th>
            <th>Jenis</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          @foreach ($vaksins as $vaksin)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ Str::upper($vaksin->nama_vaksin) }}</td>
            <td>{{ $vaksin->nomor_batch }}</td>
            <td>{{ \Carbon\Carbon::parse($vaksin->tanggal_kedaluwarsa)->isoFormat('LLLL') }}</td>
            <td>{{ $vaksin->produsen ?? '-' }}</td>
            <td>{{ $vaksin->jenisPelayanan->nama_pelayanan }}</td>
            <td>
              <ul>

                @can('permission', 'read-vaksin')
                <a href="{{ route('vaksin.show', $vaksin->uuid) }}" class="btn btn-sm btn-info"><i
                    class="ti-info-alt"></i></a>
                @endcan

                @can('permission', 'edit-vaksin')
                <a href="{{ route('vaksin.edit', $vaksin->uuid) }}" class="btn btn-sm btn-warning"><i
                    class="ti-pencil-alt"></i></a>
                @endcan

                @can('permission', 'delete-vaksin')
                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#hapusVaksin-{{ $vaksin->uuid }}" aria-controls="hapusVaksin"><i
                    class="ti-trash"></i>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusVaksin-{{ $vaksin->uuid }}"
                  aria-labelledby="hapusVaksinLabel">
                  <div class="offcanvas-header border-bottom p-4">
                    <h5 class="offcanvas-title" id="hapusVaksinLabel">Hapus Vaksin</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>

                  <div class="offcanvas-body p-4">
                    <form action="{{ route('vaksin.destroy', $vaksin->uuid) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="mb-3">
                        <span class="fs-6">Hapus {{ $vaksin->nama_vaksin }}?</span>
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