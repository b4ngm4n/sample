<table class="table table-striped table-bordered text-nowrap text-center">
   <thead>
      <tr>
         <th>#</th>
         @foreach ($kategoris as $kategori)
         @if ($kategori->status_kategori == 'tt+')
         <th class="text-dark">{{ Str::upper($kategori->nama_kategori) }} <br>( Ibu Hamil + Tidak Hamil )</th>
         @else
         <th class="text-dark">{{ Str::upper($kategori->nama_kategori) }} <br>(Laki Laki + Perempuan)</th>
         @endif
         @endforeach
      </tr>
   </thead>
   <tbody>
      @foreach ($wilayahKerja as $wk)
      <tr>
         <th class="text-dark">{{ $wk->wilayah->nama_wilayah }}</th>
         @foreach ($kategoris as $kategori)
         <td>
            <div class="row">
               @if ($kategori->status_kategori == 'tt+')
               <div class="col-md-12">
                  <p>{{ isset($pwsSasaran[$kategori->id][$wk->wilayah->id]['ibu-hamil']) ? ($pwsSasaran[$kategori->id][$wk->wilayah->id]['ibu-hamil'] + $pwsSasaran[$kategori->id][$wk->wilayah->id]['tidak-hamil']) : 0 }}</p>
               </div>
               @else
               <div class="col-md-12">
                  <p>{{ isset($pwsSasaran[$kategori->id][$wk->wilayah_id]['l']) ? ($pwsSasaran[$kategori->id][$wk->wilayah_id]['l'] + $pwsSasaran[$kategori->id][$wk->wilayah_id]['p']) : 0 }}</p>
               </div>
               @endif
            </div>
         </td>
         @endforeach
      </tr>
      @endforeach
   </tbody>
</table>