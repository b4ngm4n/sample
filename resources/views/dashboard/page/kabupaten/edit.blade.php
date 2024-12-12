@extends('dashboard.app')

@section('title', 'Edit Kabupaten')

@section('breadcrumbTitle', 'Kabupaten')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kabupaten.index') }}">List Kabupaten</a></li>
@endsection

@section('breadcrumbActive', 'Edit')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('kabupaten.update', $kabupaten->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border-bottom border-1 mb-4">
               <h5>Edit Data Kabupaten</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="provinsi">Provinsi</label>
               <select name="provinsi" class="select2 form-select"
                  data-placeholder="Pilih Provinsi ...">
                  <option value="{{ $kabupaten->provinsi->uuid }}">{{ $kabupaten->provinsi->nama_provinsi }}</option>
                  <option value="">Pilih Provinsi</option>
                  @foreach ($provinsis as $name => $key)
                  @if ($kabupaten->provinsi->uuid !== $key)
                  <option value="{{ $key }}">{{ $name }}</option>
                  @endif
                  @endforeach
               </select>

               @error('provinsi')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-kabupaten">Nama Kabupaten</label>
               <input type="text" class="form-control" id="nama-kabupaten" name="nama_kabupaten" value="{{ old('nama_kabupaten', $kabupaten->nama_kabupaten) }}">

               @error('nama_kabupaten')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-kabupaten">Kode Kabupaten</label>
               <input type="number" class="form-control" id="kode-kabupaten" name="kode_kabupaten" value="{{ old('kode_kabupaten', $kabupaten->kode_kabupaten) }}">

               @error('kode_kabupaten')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('kabupaten.index') }}" class="btn btn-danger w-md">Batal</a>
               <button type="submit" class="btn btn-warning w-md">Ubah</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection