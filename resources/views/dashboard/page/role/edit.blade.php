@extends('dashboard.app')

@section('title', 'Edit Role')

@section('breadcrumbTitle', 'Role')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('role.index') }}">List Role</a></li>
@endsection

@section('breadcrumbActive', 'Edit')

@section('content')
<div class="col-12">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('role.update', $role->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border-bottom border-1 my-3">
               <h5>Edit Role</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="role_name">Nama Role</label>
               <input type="text" class="form-control" id="role_name" name="name" value="{{ old('name', $role->name) }}"
                  placeholder="Contoh: Puskesmas / Dinas Kesehatan Provinsi / Dinas Kesehatan Kota / Tamu">

               @error('name')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('role.index') }}" class="btn btn-danger w-md">Batal</a>

               @can('permission', 'store-role')
               <button type="submit" class="btn btn-warning w-md">Ubah</button>
               @endcan
            </div>
         </form>
      </div>
   </div>
</div>
@endsection