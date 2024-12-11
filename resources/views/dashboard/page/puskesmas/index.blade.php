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
            <th>Nama Puskesmas</th>
            <th>Kode Puskesmas</th>
            <th>Wilayah Kerja</th>
            <th>Aksi</th>
          </tr>
        </thead>


        <tbody>
          @foreach ($listpuskes as $puskesmas)
          <tr>
            <td>{{ $puskesmas->nama_puskesmas }}</td>
            <td>{{ $puskesmas->kode_puskesmas }}</td>
            <td>{{ $puskesmas->wilayah_kerja }}</td>
            <td>
              <ul>
                <a href="{{ route('puskesmas.show', $puskesmas->uuid) }}" class="btn btn-sm btn-info"><i
                    class="ti-info-alt"></i></a>
                <a href="{{ route('puskesmas.edit', $puskesmas->uuid) }}" class="btn btn-sm btn-warning"><i
                    class="ti-pencil-alt"></i></a>
                <a href="{{ route('user.destroy', $user->uuid) }}" class="btn btn-sm btn-danger" data-confirm-delete="true"><i class="ti-trash"></i></a>
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