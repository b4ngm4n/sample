<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pws.imunisasi-bayi') }}" method="POST">
                @csrf
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"></th>
                            @foreach ($data['wilayahKerja'] as $wk)
                            <th>{{ $wk->wilayah->nama_wilayah }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['vaksins'] as $vaksin)
                        <tr>
                            <th class="text-nowrap">{{ $vaksin->nama_vaksin }}</th>
                            @foreach ($data['wilayahKerja'] as $wk)
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>L</label>
                                        <input type="text" name="jumlah[{{ $vaksin->id }}][{{ $wk->wilayah_id }}][L]"
                                           class="w-100 text-center"
                                            value="{{ $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_laki_laki'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>P</label>
                                        <input type="text" name="jumlah[{{ $vaksin->id }}][{{ $wk->wilayah_id }}][P]"
                                           class="w-100 text-center"
                                            value="{{ $pwsData[$vaksin->id][$wk->wilayah_id]['jumlah_perempuan'] ?? '' }}">
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