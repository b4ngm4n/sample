@extends('dashboard.app')

@section('title', 'Detail Role')

@section('breadcrumbTitle', 'Role')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('puskesmas.index') }}">List Role</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')
<div class="col-xl-12">
  <div class="card">
    <div class="card-title m-4">
      <h4 class="card-title float-start">Detail Role</h4>

      <a href="{{ route('role.index') }}" class="btn btn-primary w-md float-end"><i
          class="ti-arrow-left me-3"></i>Kembali</a>
    </div>

    <div class="card-body">
      <div class="row mb-4">
        <label for="nama-puskesmas" class="col-sm-3 col-form-label">Nama Role</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nama-puskesmas" value="{{ $role->name }}" readonly>
        </div>
      </div>

    </div>
  </div>
</div>

{{-- DATA PERMISSION --}}
{{-- <div class="container">
  <form action="" method="post">
    @csrf
    @method('PUT')
    <div class="row">
      @foreach ($permissions as $category => $items)
      <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card shadow">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">{{ ucfirst($category) }}</h5>
            <div>
              <button type="button" class="btn btn-sm btn-link text-decoration-none" id="check-all-{{ $category }}">
                Check All
              </button>
              <button type="button" class="btn btn-sm btn-link text-decoration-none text-danger"
                id="uncheck-all-{{ $category }}">
                Uncheck All
              </button>
            </div>
          </div>
          <div class="card-body">
            @foreach ($items as $permission)
            <div class="form-check">
              <input class="form-check-input check-{{ $category }}" type="checkbox" id="perm-{{ $permission->id }}"
                name="permissions[]" value="{{ $permission->id }}" {{ $role->permissions->contains($permission) ?
              'checked' : '' }}>
              <label class="form-check-label ms-2" for="perm-{{ $permission->id }}">
                {{ $permission->name }}
              </label>
              @if ($role->permissions->contains($permission))
              <span class="badge bg-success ms-2">Granted</span>
              @else
              <span class="badge bg-danger ms-2">Not Granted</span>
              @endif
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Simpan Permissions</button>
    </div>
  </form>
</div> --}}
{{-- 
@foreach ($permissions as $category => $categoryPermissions)

<div class="card mb-3">
  <div class="card-header">
    <h5 class="text-primary text-uppercase">{{ ucfirst($category) }}</h5>
  </div>
  <div class="card-body">
    <ul class="list-group">
      @foreach ($categoryPermissions as $permission)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
          <input type="checkbox" name="permission_id[]" value="{{ $permission->id }}" {{
            $role->permissions->contains('id', $permission->id) ? 'checked' : '' }}>
          {{ $permission->name }}
        </div>
        <div>
          @if ($role->permissions->contains('id', $permission->id))
          <span class="badge bg-success">Granted</span>
          @else
          <span class="badge bg-danger">Not Granted</span>
          @endif
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endforeach --}}

{{-- DATA PERMISSION --}}
<div class="col-xl-12">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('role.permissions', $role->uuid) }}" method="post">
        @csrf
        <div class="d-flex justify-content-between card-title mb-4">
          <h4 class="card-title float-start">Hak Akses</h4>

          @can('permission', 'store-role-permissions')
          <div>
            <button class="btn btn-primary w-20" type="submit"><i class="ti-save me-2"></i>Simpan</button>
          </div>
          @endcan
        </div>

        <div class="row">
          @foreach ($permissions as $category => $actions)
          <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="card-title mb-0">{{ ucfirst($category) }}</h6>
                <div>
                  <button type="button" class="btn btn-sm btn-link text-decoration-none" id="check-all-{{ $category }}">
                    Check All
                  </button>
                  <button type="button" class="btn btn-sm btn-link text-decoration-none text-danger"
                    id="uncheck-all-{{ $category }}">
                    Uncheck All
                  </button>
                </div>
              </div>
              <div class="card-body">
                @php $subCounter = 1; @endphp
                @foreach ($actions as $action => $izins)
                @foreach ($izins as $izin)
                <div class="form-check">
                  <input class="form-check-input check-{{ $category }}" type="checkbox" id="perm-{{ $izin->id }}"
                    name="permissions[]" value="{{ $izin->uuid }}" {{ $role->permissions->contains($izin) ?
                  'checked' : '' }}>
                  <label class="form-check-label ms-2" for="perm-{{ $izin->id }}">
                    {{ $subCounter++ . '. '. $izin->name }}
                  </label>
                  @if ($role->permissions->contains($izin))
                  <span class="badge bg-success ms-2">Diizinkan</span>
                  @else
                  <span class="badge bg-danger ms-2">Tidak Diizinkan</span>
                  @endif
                </div>
                @endforeach
                @endforeach
              </div>
            </div>
          </div>
          @endforeach
        </div>

      </form>
    </div>
  </div>
</div>

@endsection

@push('script')
<script>
  $(document).ready(function() {
    @foreach ($permissions as $category => $actions)
    // Check All functionality
    $('#check-all-{{ $category }}').click(function() {
      $('.check-{{ $category }}').prop('checked', true);
    });

    // Uncheck All functionality
    $('#uncheck-all-{{ $category }}').click(function() {
      $('.check-{{ $category }}').prop('checked', false);
    });
    @endforeach
  });
</script>
@endpush