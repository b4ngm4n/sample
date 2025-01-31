@extends('dashboard.app')

@section('title', 'TT WUS Tidak Hamil')

@section('breadcrumbTitle', 'Inputan Data TT WUS Tidak Hamil- '. $faskes->nama_faskes)

@section('breadcrumbActive', 'TT WUS Tidak Hamil')

@section('content')
<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('pws.imunisasi-wus-tidak-hamil') }}" method="GET" id="filterForm">
            <div class="row">
               <!-- Tahun -->
               <div class="col-md-4">
                  <label for="tahun" class="form-label">Tahun</label>
                  <select name="tahun" id="tahun" class="select2 form-control w-100" style="width: 100%;">
                     @foreach ($tahuns as $tahunItem)
                     <option value="{{ $tahunItem->id }}" {{ $tahunItem->id == $tahun ? 'selected' : '' }}>
                        {{ $tahunItem->tahun }}
                     </option>
                     @endforeach
                  </select>
               </div>

               <!-- Bulan -->
               <div class="col-md-4">
                  <label for="bulan" class="form-label">Bulan</label>
                  <select name="bulan" id="bulan" class="select2 form-control w-100" style="width: 100%;">
                     @foreach ($bulans as $bulanItem)
                     <option value="{{ $bulanItem->id }}" {{ $bulanItem->id == $bulan ? 'selected' : '' }}>
                        {{ $bulanItem->bulan }}
                     </option>
                     @endforeach
                  </select>
               </div>

               <!-- Faskes -->
               @if ($faskesList->isNotEmpty())
               <div class="col-md-4">
                  <label for="faskes" class="form-label">Faskes</label>
                  <select name="faskes" id="faskes" class="select2 form-control w-100" style="width: 100%;">
                     @foreach ($faskesList as $faskesItem)
                     <option value="{{ $faskesItem->id }}" {{ $faskesItem->id == $faskes->id ? 'selected' : ''
                        }}>
                        {{ $faskesItem->nama_faskes }}
                     </option>
                     @endforeach
                  </select>
               </div>
               @endif
            </div>

            <button type="submit" class="btn btn-primary float-end mt-3"><i class="ti-filter me-2"></i>Filter</button>
         </form>
      </div>
   </div>
</div>

<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('pws.imunisasi-wus-tidak-hamil') }}" method="POST">
            @csrf
            <table class="table table-striped table-bordered" id="datatable">
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
                                <label>Suntik</label>
                                <input type="number" name="jumlah[{{ $vaksin->id }}][{{ $wk->wilayah_id }}][Suntik]"
                                    class="form-control"
                                    value="{{ $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_wus_suntik'] ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label>Status</label>
                                <input type="number" name="jumlah[{{ $vaksin->id }}][{{ $wk->wilayah_id }}][Status]"
                                    class="form-control"
                                    value="{{ $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_wus_status'] ?? '' }}">
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