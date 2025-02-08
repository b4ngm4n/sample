<div class="col-md-12">
   <div class="card">
      <div class="mb-0 mt-3 me-3">
         <button id="btnCakupanBaduta" class="btn btn-sm btn-outline-primary float-end"><i class="ti-download me-2"></i>Gambar</button>
      </div>
      <div class="card-body"  id="tableCakupanBaduta">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th class="text-center text-dark" rowspan="2">Vaksin</th>
                  @foreach ($wilayahKerja as $wk)
                  <th class="text-center text-dark">{{ $wk->wilayah->nama_wilayah }}</th>
                  @endforeach
                  <th class="text-center text-dark bg-warning">Total</th>
               </tr>
               <tr>
                  @foreach ($wilayahKerja as $wk)
                  <th>
                     <div class="row">
                        <div class="col-md-6">
                           <label>L</label>
                        </div>
                        <div class="col-md-6">
                           <label>P</label>
                        </div>
                     </div>
                  </th>
                  @endforeach
                  <th class="bg-warning">
                     <div class="row">
                        <div class="col-md-6">
                           <label>L</label>
                        </div>
                        <div class="col-md-6">
                           <label>P</label>
                        </div>
                     </div>
                  </th>
               </tr>
            </thead>
            <tbody>
               @php
               // $totalPerKolom = [];
               $totalKolomLaki = [];
               $totalKolomPerempuan = [];
               @endphp
               @foreach ($vaksins as $vaksin)
               <tr>
                  <th class="text-nowrap text-dark">{{ $vaksin->nama_vaksin }}</th>
                  @php
                  $totalBarisLaki = 0;
                  $totalBarisPerempuan = 0;
                  @endphp
                  @foreach ($wilayahKerja as $wk)
                  @php
                  $jumlahL = $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_laki_laki'] ?? 0;
                  $jumlahP = $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_perempuan'] ?? 0;

                  $totalWilayah = $jumlahL + $jumlahP;

                  // $totalPerKolom[$wk->wilayah_id] = ($totalPerKolom[$wk->wilayah_id] ?? 0) + $totalWilayah;
                  $totalKolomLaki[$wk->wilayah_id] = ($totalKolomLaki[$wk->wilayah_id] ?? 0) + $jumlahL;
                  $totalKolomPerempuan[$wk->wilayah_id] = ($totalKolomPerempuan[$wk->wilayah_id] ?? 0) + $jumlahP;

                  $totalBarisLaki += $jumlahL;
                  $totalBarisPerempuan += $jumlahP;

                  @endphp

                  {{-- UNTUK DATA --}}
                  <td>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center" value="{{ $jumlahL }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center" value="{{ $jumlahP }}">
                        </div>
                     </div>
                  </td>
                  @endforeach
                  <td class="bg-warning">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center" value="{{ $totalBarisLaki }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ $totalBarisPerempuan }}">
                        </div>
                     </div>
                  </td>

               </tr>
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <th class="text-center bg-warning text-dark">Total</th>
                  @foreach ($wilayahKerja as $wk)
                  <th class="text-center bg-warning text-dark">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ $totalKolomLaki[$wk->wilayah_id] ?? 0 }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ $totalKolomPerempuan[$wk->wilayah_id] ?? 0 }}">
                        </div>
                     </div>
                  </th>
                  @endforeach
                  <th class="text-center bg-warning text-dark">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ array_sum($totalKolomLaki) }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ array_sum($totalKolomPerempuan) }}">
                        </div>
                     </div>
                  </th>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>