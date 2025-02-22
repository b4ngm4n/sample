@extends('dashboard.app')

@section('title', 'Tambah Vaksin')

@section('breadcrumbTitle', 'Vaksin')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('vaksin.index') }}">List Vaksin</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('vaksin.store') }}" method="POST">
            @csrf
            <div class="border-bottom border-1 my-3">
               <h5>Tambah Data Vaksin</h5>
            </div>

            <div class="mb-3">
               <label for="kategori" class="form-label">Kategori</label>
               <select name="kategori" class="select2 form-select" data-placeholder="Pilih Kategori Vaksin...">
                  @foreach ($kategoris as $kategori)
                  <option value="{{ $kategori->uuid }}">{{ $kategori->nama_kategori }}</option>
                  @endforeach
               </select>

               @error('kategori')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-vaksin">Nama Vaksin</label>
               <input type="text" class="form-control" id="nama-vaksin" name="nama_vaksin" value="{{ old('nama_vaksin') }}"
                  placeholder="Contoh: CoronaVac / BCG / Polio / IPV">

               @error('nama_vaksin')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="urutan-vaksin">Urutan Vaksin</label>
               <input type="number" class="form-control" id="urutan-vaksin" name="urutan_vaksin" value="{{ old('urutan_vaksin') }}">

               @error('urutan_vaksin')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="nomor-batch">Nomor Batch</label>
               <input type="text" class="form-control" id="nomor-batch" name="nomor_batch" placeholder="Contoh: VCV2021000363" value="{{ old('nomor_batch') }}">

               @error('nomor_batch')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="produsen">Produsen</label>
               <input type="text" class="form-control" id="produsen" name="produsen" value="{{ old('produsen') }}"
                  placeholder="Contoh: Sinovac Biotech Ltd">

               @error('produsen')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="jumlah">Jumlah</label>
               <input type="text" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}">

               @error('jumlah')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="tanggal_produksi">Tangagl Produksi</label>
               <input type="date" class="form-control" id="tanggal_produksi" name="tanggal_produksi" value="{{ old('tanggal_produksi') }}">

               @error('tanggal_produksi')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="tanggal_kedaluwarsa">Tanggal Kedaluwarsa</label>
               <input type="date" class="form-control" id="tanggal_kedaluwarsa" name="tanggal_kedaluwarsa" value="{{ old('tanggal_kedaluwarsa') }}">

               @error('tanggal_kedaluwarsa')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('vaksin.index') }}" class="btn btn-danger w-md">Batal</a>
               
               @can('permission', 'store-vaksin')
               <button type="submit" class="btn btn-primary w-md">Simpan</button>
               @endcan
            </div>
         </form>

      </div>
   </div>
</div>
@endsection