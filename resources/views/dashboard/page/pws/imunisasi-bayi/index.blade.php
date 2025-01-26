@extends('dashboard.app')

@section('title', 'Imunisasi Bayi')

@section('breadcrumbTitle', 'Inputan Data Imunisasi Bayi - '. $faskes->nama_faskes)

@section('breadcrumbActive', 'Imunisasi Bayi')

@section('content')

<div class="col-md-12">
   <div class="card">
       <div class="card-body">
           <form action="{{ route('pws.imunisasi-bayi') }}" method="GET" id="filterForm">
               <div class="row">
                   <!-- Tahun -->
                   <div class="col-md-6">
                       <div class="mb-3">
                           <label for="tahun" class="form-label">Tahun</label>
                           <select name="tahun" id="tahun" class="form-select">
                               @foreach ($tahuns as $tahunItem)
                                   <option value="{{ $tahunItem->id }}" {{ $tahunItem->id == $tahun ? 'selected' : '' }}>
                                       {{ $tahunItem->tahun }}
                                   </option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   <!-- Bulan -->
                   <div class="col-md-6">
                       <div class="mb-3">
                           <label for="bulan" class="form-label">Bulan</label>
                           <select name="bulan" id="bulan" class="form-select">
                               @foreach ($bulans as $bulanItem)
                                   <option value="{{ $bulanItem->id }}" {{ $bulanItem->id == $bulan ? 'selected' : '' }}>
                                       {{ $bulanItem->bulan }}
                                   </option>
                               @endforeach
                           </select>
                       </div>
                   </div>
               </div>
               <button type="submit" class="btn btn-primary float-end"><i class="ti-filter me-2"></i>Filter</button>
           </form>
       </div>
   </div>
</div>

<div class="col-md-12">
   <div class="card">
       <div class="card-body">
           <form action="{{ route('pws.imunisasi-bayi') }}" method="POST">
               @csrf
               <input type="hidden" name="tahun" value="{{ $tahun }}">
               <input type="hidden" name="bulan" value="{{ $bulan }}">
               <table class="table table-striped table-bordered">
                   <thead>
                       <tr>
                           <th></th>
                           @foreach ($data['wilayahKerja'] as $wk)
                               <th>{{ $wk->wilayah->nama_wilayah }}</th>
                           @endforeach
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($data['vaksins'] as $vaksin)
                           <tr>
                               <th>{{ $vaksin->nama_vaksin }}</th>
                               @foreach ($data['wilayahKerja'] as $wk)
                                   <td>
                                       <div class="row">
                                           <div class="col-md-6">
                                               <label>L</label>
                                               <input type="number" name="jumlah[{{ $vaksin->id }}][{{ $wk->id }}][L]"
                                                      class="form-control"
                                                      value="{{ $pwsData[$vaksin->id][$wk->id]['L'] ?? '' }}">
                                           </div>
                                           <div class="col-md-6">
                                               <label>P</label>
                                               <input type="number" name="jumlah[{{ $vaksin->id }}][{{ $wk->id }}][P]"
                                                      class="form-control"
                                                      value="{{ $pwsData[$vaksin->id][$wk->id]['P'] ?? '' }}">
                                           </div>
                                       </div>
                                   </td>
                               @endforeach
                           </tr>
                       @endforeach
                   </tbody>
               </table>
               <button type="submit" class="btn btn-primary float-end"><i class="ti-save me-2"></i>Simpan</button>
           </form>
       </div>
   </div>
</div>

@endsection