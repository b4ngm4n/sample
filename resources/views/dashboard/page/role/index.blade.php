@extends('dashboard.app')

@section('title', 'Role')

@section('breadcrumbTitle', 'Role')

@section('breadcrumbActive', 'List Role')

@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-title">
      <a href="{{ route('role.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
          class="bx bxs-plus-square me-2"></i>Tambah Role</a>
    </div>
    <div class="card-body">

      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap data-table-area">
        <thead>
          <tr>
            <th>Nama Role</th>
            <th>Permission</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
          <tr>
            <td>{{ $role->name }}</td>
            <td>{{ $role->permissions_count ?? 0 }} Hak Akses</td>
            <td>
              <ul>

                @can('permission', 'read-role')
                <a href="{{ route('role.show', $role->uuid) }}" class="btn btn-sm btn-info"><i
                    class="ti-info-alt"></i></a>
                @endcan

                @can('permission', 'edit-role')
                <a href="{{ route('role.edit', $role->uuid) }}" class="btn btn-sm btn-warning"><i
                    class="ti-pencil-alt"></i></a>
                @endcan

                @can('permission', 'delete-role')
                <button class="btn btn-sm btn-danger" type="button" data-bs-toggle="offcanvas"
                  data-bs-target="#hapusRole-{{ $role->uuid }}" aria-controls="hapusRole"><i class="ti-trash"></i>
                </button>

                <div class="offcanvas offcanvas-end" tabindex="-1" id="hapusRole-{{ $role->uuid }}"
                  aria-labelledby="hapusRoleLabel">
                  <div class="offcanvas-header border-bottom p-4">
                    <h5 class="offcanvas-title" id="hapusRoleLabel">Hapus Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>

                  <div class="offcanvas-body p-4">
                    <form action="{{ route('role.destroy', $role->uuid) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="mb-3">
                        <span class="fs-6">Hapus {{ $role->name }}?</span>
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