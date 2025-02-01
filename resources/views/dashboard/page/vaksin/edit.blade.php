@extends('dashboard.app')

@section('title', 'Edit Vaksin')

@section('breadcrumbTitle', 'Vaksin')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('vaksin.index') }}">List Vaksin</a></li>
@endsection

@section('breadcrumbActive', 'Edit')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-body">

         <form action="{{ route('vaksin.update', $vaksin->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="border-bottom border-1 my-3">
               <h5>Edit Data Vaksin</h5>
            </div>

            <div class="mb-3">
               <label class="form-label" for="nama-vaksin">Nama Vaksin</label>
               <input type="text" class="form-control" id="nama-vaksin" name="nama_vaksin" value="{{ old('nama_vaksin', $vaksin->nama_vaksin) }}"
                  placeholder="Contoh: CoronaVac / BCG / Polio / IPV">

               @error('nama_vaksin')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="urutan-vaksin">Urutan Vaksin</label>
               <input type="text" class="form-control" id="urutan-vaksin" name="urutan_vaksin" value="{{ old('urutan_vaksin', $vaksin->urutan_vaksin) }}">

               @error('urutan_vaksin')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mb-3">
               <label class="form-label" for="produsen">Produsen</label>
               <input type="text" class="form-control" id="produsen" name="produsen" value="{{ old('produsen', $vaksin->produsen) }}"
                  placeholder="Contoh: Sinovac Biotech Ltd">

               @error('produsen')
               <small class="text-danger">{{ $message }}</small>
               @enderror
            </div>

            <div class="mt-4">
               <a href="{{ route('vaksin.index') }}" class="btn btn-danger w-md">Batal</a>

               @can('permission', 'update-vaksin')
               <button type="submit" class="btn btn-warning w-md">Ubah</button>
               @endcan
            </div>
         </form>

      </div>
   </div>
</div>
@endsection