@extends('dashboard.app')

@section('title', 'Edit Kecamatan')

@section('breadcrumbTitle', 'Kecamatan')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('kecamatan.index') }}">List Kecamatan</a></li>
@endsection

@section('breadcrumbActive', 'Edit')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('kecamatan.update', $kecamatan->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border-bottom border-1 mb-4">
               <h5>Edit Data Kecamatan</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="kabupaten">Kabupaten</label>
               {{-- <select name="kabupaten" id="kabupaten" class="form-select">
                  <option value="{{ $kecamatan->kabupaten->uuid }}">{{ $kecamatan->kabupaten->nama_kabupaten }}</option>
                  <option value="">Pilih Kabupaten</option>
                  @foreach ($kabupatens as $kabupaten)
                  <option value="{{ $kabupaten->uuid }}">{{ $kabupaten->nama_kabupaten }}</option>
                  @endforeach
               </select> --}}
               <select name="kabupaten" class="select2 form-control" data-placeholder="Pilih Kabupaten ...">
                  <option value="{{ $kecamatan->kabupaten->uuid }}" selected>{{ $kecamatan->kabupaten->nama_kabupaten }}
                  </option>
                  @foreach ($kabupatens as $kabupaten)
                  @if ($kabupaten->uuid !== $kecamatan->kabupaten->uuid)
                  <option value="{{ $kabupaten->uuid }}">{{ $kabupaten->nama_kabupaten }}</option>
                  @endif
                  @endforeach
               </select>

               @error('kabupaten')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-kecamatan">Nama Kecamatan</label>
               <input type="text" class="form-control" id="nama-kecamatan" name="nama_kecamatan"
                  value="{{ old('nama_kecamatan', $kecamatan->nama_kecamatan) }}">

               @error('nama_kecamatan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="kode-kecamatan">Kode Kecamatan</label>
               <input type="number" class="form-control" id="kode-kecamatan" name="kode_kecamatan"
                  value="{{ old('kode_kecamatan', $kecamatan->kode_kecamatan) }}">

               @error('kode_kecamatan')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('kecamatan.index') }}" class="btn btn-danger w-md">Batal</a>
               <button type="submit" class="btn btn-warning w-md">Ubah</button>
            </div>
         </form>

      </div>
   </div>
</div>
@endsection