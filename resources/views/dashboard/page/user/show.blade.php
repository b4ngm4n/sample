@extends('dashboard.app')

@section('title', 'Show User')

@section('content')

<div class="container">
    <h2>Detail User: {{ $user->name }}</h2>

    {{-- Section for Roles --}}
    <div class="card my-4">
        <div class="card-header">
            <h5 class="card-title mb-0">Roles</h5>
        </div>
        <div class="card-body">
            <ul>
                @foreach ($user->roles as $role)
                <li>
                    <strong>{{ $role->name }}</strong>
                    <span class="badge bg-success">Granted</span>
                    <ul class="mt-2">
                        @foreach ($role->permissions as $permission)
                        <li>{{ $permission->name }} <span class="badge bg-info">Role: {{ $role->name }}</span></li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
            <form action="{{ route('user.roles', $user->uuid) }}" method="POST" class="mt-3">
                @csrf
                <select name="role_id" class="form-select form-select-sm d-inline-block w-auto me-2">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ $user->roles->contains($role) ? 'disabled' : '' }}>
                        {{ $role->name }}
                    </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-sm btn-primary">Assign Role</button>
            </form>
        </div>
    </div>

    {{-- Section for Permissions --}}
    <div class="row">
        @foreach ($permissions as $category => $items)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ ucfirst($category) }}</h5>
                    <div>
                        <button type="button" class="btn btn-sm btn-link text-decoration-none"
                            id="check-all-{{ $category }}">
                            Check All
                        </button>
                        <button type="button" class="btn btn-sm btn-link text-decoration-none text-danger"
                            id="uncheck-all-{{ $category }}">
                            Uncheck All
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.permissions', $user->uuid) }}" method="POST">
                        @csrf
                        @foreach ($items as $permission)
                        <div class="form-check">
                            <input class="form-check-input check-{{ $category }}" type="checkbox"
                                id="perm-{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}" {{
                                $rolePermissions->contains($permission) ? 'checked disabled' : '' }}>
                            <label class="form-check-label ms-2" for="perm-{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                            @if ($rolePermissions->contains($permission))
                            <span class="badge bg-success ms-2">Granted</span>
                            @else
                            <span class="badge bg-danger ms-2">Not Granted</span>
                            @endif
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Save Permissions</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function () {
      @foreach ($permissions as $category => $items)
        // Check All functionality
        $('#check-all-{{ $category }}').click(function () {
          $('.check-{{ $category }}:not(:disabled)').prop('checked', true);
        });
  
        // Uncheck All functionality
        $('#uncheck-all-{{ $category }}').click(function () {
          $('.check-{{ $category }}:not(:disabled)').prop('checked', false);
        });
      @endforeach
    });
</script>

@endsection