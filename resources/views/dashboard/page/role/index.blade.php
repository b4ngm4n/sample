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
            <td>{{ $role->permissions->count() }}</td>
            <td class="gap-2">
              <a href="{{ route('role.show', $role->uuid) }}" class="btn btn-sm btn-info"><i class="ti-info-alt"></i></a>
              <a href="{{ route('role.edit', $role->uuid) }}" class="btn btn-sm btn-warning"><i class="ti-pencil-alt"></i></a>
              <button class="btn btn-danger btn-sm"><i class="ti-trash"></i></button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection