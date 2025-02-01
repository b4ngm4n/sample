<div class="col-md-12">
   <div class="card">
      <div class="card-body">
         <form action="{{ route('pws.sasaran') }}" method="POST">
            @csrf
            <table class="table table-striped table-bordered">
               <thead>
                  <tr>
                     <th>#</th>
                     @foreach ($kategoris as $kategori)
                     <th class="text-dark">{{ Str::upper($kategori->nama_kategori) }}</th>
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
                           <div class="col-md-6">
                              <label>IBU HAMIL</label>
                              <input type="number" name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][ibu_hamil]"
                                 class="form-control"
                                 value="{{ $pwsSasaran[$kategori->id][$wk->wilayah->id]['ibu-hamil'] ?? 0 }}">
                           </div>
                           <div class="col-md-6">
                              <label>TIDAK HAMIL</label>
                              <input type="number"
                                 name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][tidak_hamil]"
                                 class="form-control"
                                 value="{{ $pwsSasaran[$kategori->id][$wk->wilayah_id]['tidak-hamil'] ?? 0 }}">
                           </div>
                           @else
                           <div class="col-md-6">
                              <label>L</label>
                              <input type="number" name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][l]"
                                 class="form-control"
                                 value="{{ $pwsSasaran[$kategori->id][$wk->wilayah_id]['l'] ?? 0 }}">
                           </div>
                           <div class="col-md-6">
                              <label>P</label>
                              <input type="number" name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][p]"
                                 class="form-control"
                                 value="{{ $pwsSasaran[$kategori->id][$wk->wilayah_id]['p'] ?? 0 }}">
                           </div>
                           @endif
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