@extends('dashboard.app')

@section('title', 'Detail Wilayah')

@section('breadcrumbTitle', 'Wilayah')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('wilayah.index') }}">List Role</a></li>
@endsection

@section('breadcrumbActive', 'Detail')

@section('content')

<div class="col-xl-12">
   <div class="card">
      <div class="card-title me-4 ms-4 mt-4 mb-0">
         <h4 class="card-title float-start">Detail Wilayah</h4>

         <a href="{{ route('wilayah.index') }}" class="btn btn-primary w-md float-end"><i
               class="ti-arrow-left me-3"></i>Kembali</a>
      </div>

      <div class="card-body">
         <div class="row mb-4">
            <div class="col-6">
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <label for="" class="form-label">Nama Wilayah</label>
                        <input type="text" value="{{ $wilayah->nama_wilayah }}" class="form-control" readonly>
                     </div>

                     <div class="mb-3">
                        <label for="" class="form-label">Kode Wilayah</label>
                        <input type="text" value="{{ $wilayah->kode_wilayah }}" class="form-control" readonly>
                     </div>

                     <div class="mb-3">
                        <label for="" class="form-label">Induk Wilayah</label>
                        <input type="text" value="{{ $wilayah->parent->nama_wilayah ?? '' }}" class="form-control" readonly>
                     </div>

                     <div class="mb-3">
                        <label for="" class="form-label">Jenis Wilayah</label>
                        <input type="text" value="{{ Str::ucfirst($wilayah->jenis_wilayah) }}" class="form-control"
                           readonly>
                     </div>
                  </div>
               </div>
            </div>

            <div class="col-6">
               <div class="card">
                  <div class="card-body">
                     <div class="mb-3">
                        <h6>Anakan Wilayah - {{ $wilayah->nama_wilayah }}</h6>
                        <ul class="list-group">
                           @foreach ($wilayah->children as $children)
                           <li class="list-group-item">{{ $children->nama_wilayah .' - '. $children->kode_wilayah }}
                              <span class="badge bg-primary badge-sm">{{ Str::ucfirst($children->jenis_wilayah)
                                 }}</span>
                           </li>
                           @endforeach
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="card">
            <div class="card-body">
               <div class="mb-3">
                  <h6>Faskes di Wilayah - {{ $wilayah->nama_wilayah }}</h6>
                  <ul class="list-group">
                     @foreach ($datafaskes as $faskes)
                     <li class="list-group-item">{{ $faskes->nama_faskes .' - '. $faskes->kode_faskes }} <span
                           class="badge bg-primary badge-sm">{{ Str::ucfirst($faskes->jenis_faskes) }}</span></li>
                     @foreach ($faskes->children as $children)

                     <li class="list-group-item">{{ $children->nama_faskes .' - '. $children->kode_faskes }} <span
                           class="badge bg-primary badge-sm">{{ Str::ucfirst($children->jenis_faskes) }}</span></li>
                     @endforeach
                     @endforeach
                     {{-- @json($wilayah->faskes()->withDepth()->get()) --}}
                  </ul>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>

@endsection