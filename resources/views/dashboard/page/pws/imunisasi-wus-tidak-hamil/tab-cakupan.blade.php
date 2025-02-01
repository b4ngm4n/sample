<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('pws.imunisasi-wus-tidak-hamil') }}" method="POST">
            @csrf
            <table class="table table-striped table-bordered text-center">
               <thead>
                  <tr>
                     <th></th>
                     @foreach ($data['wilayahKerja'] as $wk)
                     <th class="text-center">{{ $wk->wilayah->nama_wilayah }}</th>
                     @endforeach
                  </tr>
               </thead>
               <tbody>
                  @foreach ($data['vaksins'] as $vaksin)
                  <tr>
                     <th>{{ $vaksin->nama_vaksin }}</th>
                     @foreach ($data['wilayahKerja'] as $wk)
                     <td>
                        {{ isset($pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_wus_suntik']) ? ($pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_wus_suntik'] + $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_wus_status']) : 0 }}
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