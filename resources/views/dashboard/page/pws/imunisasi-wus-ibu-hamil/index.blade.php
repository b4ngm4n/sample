@extends('dashboard.app')

@section('title', 'TT WUS Ibu Hamil')

@section('breadcrumbTitle', 'Inputan Data TT WUS Ibu Hamil- '. $faskes->nama_faskes . ' - ' . $bulan->bulan . ' ' . $tahun->tahun )

@section('breadcrumbActive', 'TT WUS Ibu Hamil')

@section('content')
<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('pws.imunisasi-wus-ibu-hamil') }}" method="GET" id="filterForm">
            <div class="row">
               <!-- Tahun -->
               <div class="col-md-4">
                  <label for="tahun" class="form-label">Tahun</label>
                  <select name="tahun" id="tahun" class="select2 form-control w-100" style="width: 100%;">
                     @foreach ($tahuns as $tahunItem)
                     <option value="{{ $tahunItem->id }}" {{ $tahunItem->id == $tahun->id ? 'selected' : '' }}>
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
                     <option value="{{ $bulanItem->id }}" {{ $bulanItem->id == $bulan->id ? 'selected' : '' }}>
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
           <div class="d-md-flex align-items-center justify-content-between profile-body-header">
               <ul class="nav nav-tabs justify-content-start profile-body-tabs" id="myTab" role="tablist">
                   <li class="nav-item" role="presentation">
                       <button class="nav-link active" id="inputan-tab" data-bs-toggle="tab"
                           data-bs-target="#inputan-tab-pane" type="button" role="tab"
                           aria-controls="inputan-tab-pane" aria-selected="true">Inputan Data</button>
                   </li>
                   <li class="nav-item" role="presentation">
                       <button class="nav-link" id="kumulatif-tab" data-bs-toggle="tab" data-bs-target="#kumulatif-tab-pane"
                           type="button" role="tab" aria-controls="kumulatif-tab-pane" aria-selected="false"
                           tabindex="-1">Akumulasi Data</button>
                   </li>

               </ul>

           </div>

           <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade active show" id="inputan-tab-pane" role="tabpanel"
                   aria-labelledby="inputan-tab" tabindex="0">
                   @include('dashboard.page.pws.imunisasi-wus-ibu-hamil.tab-inputan')
               </div>

               <div class="tab-pane fade p-0 border-0" id="kumulatif-tab-pane" role="tabpanel" aria-labelledby="kumulatif-tab"
                   tabindex="0">
                   @include('dashboard.page.pws.imunisasi-wus-ibu-hamil.tab-cakupan')
               </div>
           </div>

       </div>
   </div>
</div>

@endsection

@push('script')
    <script>

    document.getElementById('btnCakupanIbuHamil').addEventListener('click', function () {
        // Panggil fungsi untuk membuat gambar dari tabel
        captureTable();
    });

    function captureTable() {
        // Ambil elemen kontainer tabel
        const tableContainer = document.getElementById('tableCakupanIbuHamil');



         // Tambahkan judul sebelum mengonversi ke gambar
        const title = document.createElement('div');
        title.style.textAlign = 'center';
        title.style.fontSize = '20px';
        title.style.marginBottom = '10px';
        title.textContent = "Laporan Cakupan Imunisasi WUS Ibu Hamil";
        tableContainer.insertBefore(title, tableContainer.firstChild);

        // Konversi elemen HTML menjadi gambar menggunakan html2canvas
        html2canvas(tableContainer).then(function(canvas) {
            // Hapus judul setelah konversi
            tableContainer.removeChild(title);

            // Dapatkan data URL gambar PNG
            const imgData = canvas.toDataURL('image/png');

            // Dapatkan tanggal saat ini menggunakan variabel PHP
            const currentDate = "{{ date('d-m-Y') }}";

            // Buat elemen <a> untuk menautkan data URL dan simpan gambar
            const link = document.createElement('a');
            link.href = imgData;
            link.download = 'Cakupan_Imunisasi_WUS_Ibu_Hamil_' + currentDate + '.png';
            link.click();
        });
    }

    </script>
@endpush