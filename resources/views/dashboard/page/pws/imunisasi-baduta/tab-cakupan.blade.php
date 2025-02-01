<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <table class="table table-striped table-bordered text-center">
            <thead>
               <tr>
                  <th></th>
                  @foreach ($data['wilayahKerja'] as $wk)
                  <th>{{ $wk->wilayah->nama_wilayah }} <br>(L + P)</th>
                  @endforeach
               </tr>
            </thead>
            <tbody>
               @foreach ($data['vaksins'] as $vaksin)
               <tr>
                  <th class="text-nowrap">{{ $vaksin->nama_vaksin }}</th>
                  @foreach ($data['wilayahKerja'] as $wk)
                  <td>
                     {{ isset($pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_laki_laki']) ? ($pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_laki_laki'] + $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_perempuan']) : 0  }}
                  </td>
                  @endforeach
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>