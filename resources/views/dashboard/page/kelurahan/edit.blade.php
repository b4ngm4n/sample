@extends('dashboard.app')

@section('title', 'Edit Kelurahan')

@section('breadcrumbTitle', 'Kelurahan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kelurahan.index') }}">List Kelurahan</a></li>
@endsection

@section('breadcrumbActive', 'Edit')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('kelurahan.update', $kelurahan->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border-bottom border-1 mb-4">
               <h5>Edit Data Kelurahan</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="kecamatan">Kecamatan</label>
               <select name="kecamatan" class="select2 form-control" data-placeholder="Pilih Kecamatan ...">
                  <option value="{{ $kelurahan->kecamatan->uuid }}" selected>{{ $kelurahan->kecamatan->nama_kecamatan }}
                  </option>
                  @foreach ($kecamatans as $kecamatan)
                  @if ($kecamatan->uuid !== $kelurahan->kecamatan->uuid)
                  <option value="{{ $kecamatan->uuid }}">{{ $kecamatan->nama_kecamatan }}</option>
                  @endif
                  @endforeach
               </select>

               @error('kecamatan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-kelurahan">Nama kelurahan</label>
               <input type="text" class="form-control" id="nama-kelurahan" name="nama_kelurahan"
                  value="{{ old('nama_kelurahan', $kelurahan->nama_kelurahan) }}">

               @error('nama_kelurahan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-kelurahan">Kode kelurahan</label>
               <input type="number" class="form-control" id="kode-kelurahan" name="kode_kelurahan"
                  value="{{ old('kode_kelurahan', $kelurahan->kode_kelurahan) }}">

               @error('kode_kelurahan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('kelurahan.index') }}" class="btn btn-danger w-md">Batal</a>
               <button type="submit" class="btn btn-warning w-md">Ubah</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection