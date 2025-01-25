@extends('dashboard.app')

@section('title', 'Tambah User')

@section('breadcrumbTitle', 'User')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('user.index') }}">List User</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')
<div class="col-12">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 my-3">
               <h5>Tambah Role</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="role_name">Nama Role</label>
               <input type="text" class="form-control" id="role_name" name="name" value="{{ old('name') }}"
                  placeholder="Contoh: Puskesmas / Dinas Kesehatan Provinsi / Dinas Kesehatan Kota / Tamu">

               @error('name')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('role.index') }}" class="btn btn-danger w-md">Batal</a>

               @can('permission', 'store-role')
               <button type="submit" class="btn btn-primary w-md">Simpan</button>
               @endcan
            </div>
         </form>
      </div>
   </div>
</div>
@endsection