<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th class="text-center text-dark" rowspan="2">Vaksin</th>
                  @foreach ($data['wilayahKerja'] as $wk)
                  <th class="text-center text-dark">{{ $wk->wilayah->nama_wilayah }}</th>
                  @endforeach
                  <th class="text-center text-dark bg-warning">Total</th>
               </tr>
               <tr>
                  @foreach ($data['wilayahKerja'] as $wk)
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
               $totalKolomSuntik = [];
               $totalKolomStatus = [];
               @endphp
               @foreach ($data['vaksins'] as $vaksin)
               <tr>
                  <th class="text-nowrap text-dark">{{ $vaksin->nama_vaksin }}</th>
                  @php
                  $totalBarisSuntik = 0;
                  $totalBarisStatus = 0;
                  @endphp
                  @foreach ($data['wilayahKerja'] as $wk)
                  @php
                  $jumlahSuntik = $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_wus_suntik'] ?? 0;
                  $jumlahStatus = $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_wus_status'] ?? 0;

                  $totalWilayah = $jumlahSuntik + $jumlahStatus;

                  // $totalPerKolom[$wk->wilayah_id] = ($totalPerKolom[$wk->wilayah_id] ?? 0) + $totalWilayah;
                  $totalKolomSuntik[$wk->wilayah_id] = ($totalKolomSuntik[$wk->wilayah_id] ?? 0) + $jumlahSuntik;
                  $totalKolomStatus[$wk->wilayah_id] = ($totalKolomStatus[$wk->wilayah_id] ?? 0) + $jumlahStatus;

                  $totalBarisSuntik += $jumlahSuntik;
                  $totalBarisStatus += $jumlahStatus;

                  @endphp

                  {{-- UNTUK DATA --}}
                  <td>
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center" value="{{ $jumlahSuntik }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center" value="{{ $jumlahStatus }}">
                        </div>
                     </div>
                  </td>
                  @endforeach
                  <td class="bg-warning">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center" value="{{ $totalBarisSuntik }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ $totalBarisStatus }}">
                        </div>
                     </div>
                  </td>

               </tr>
               @endforeach
            </tbody>
            <tfoot>
               <tr>
                  <th class="text-center bg-warning text-dark">Total</th>
                  @foreach ($data['wilayahKerja'] as $wk)
                  <th class="text-center bg-warning text-dark">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ $totalKolomSuntik[$wk->wilayah_id] ?? 0 }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ $totalKolomStatus[$wk->wilayah_id] ?? 0 }}">
                        </div>
                     </div>
                  </th>
                  @endforeach
                  <th class="text-center bg-warning text-dark">
                     <div class="row">
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ array_sum($totalKolomSuntik) }}">
                        </div>
                        <div class="col-md-6">
                           <input type="text" disabled readonly class="w-100 text-center"
                              value="{{ array_sum($totalKolomStatus) }}">
                        </div>
                     </div>
                  </th>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>