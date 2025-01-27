@extends('dashboard.app')

@section('title', 'Detail Role')

@section('breadcrumbTitle', 'Role')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('role.index') }}">List Role</a></li>
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
            <div class="card">
              <div class="ms-3 me-2 mt-2 d-flex justify-content-between align-items-center border-bottom">
                <h6>{{ ucfirst($category) }}</h6>
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