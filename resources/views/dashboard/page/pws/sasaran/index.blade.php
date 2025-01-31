@extends('dashboard.app')

@section('title', 'Data Sasaran')

@section('breadcrumbTitle', 'Data Sasaran - '. $faskes->nama_faskes)

@section('breadcrumbActive', 'Data Sasaran')

@section('content')

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('pws.sasaran') }}" method="GET" id="filterForm">
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

                    <!-- Faskes -->
                    @if ($faskesList->isNotEmpty())
                    <div class="col-md-8">
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

                <button type="submit" class="btn btn-primary float-end mt-3"><i
                        class="ti-filter me-2"></i>Filter</button>
            </form>
        </div>
    </div>
</div>

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
                                        <input type="number"
                                            name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][ibu_hamil]"
                                            class="form-control"
                                            value="{{ $pwsSasaran[$kategori->id][$wk->wilayah->id]['ibu-hamil'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>TIDAK HAMIL</label>
                                        <input type="number"
                                            name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][tidak_hamil]"
                                            class="form-control"
                                            value="{{ $pwsSasaran[$kategori->id][$wk->wilayah_id]['tidak-hamil'] ?? '' }}">
                                    </div>
                                    @else
                                    <div class="col-md-6">
                                        <label>L</label>
                                        <input type="number"
                                            name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][l]"
                                            class="form-control"
                                            value="{{ $pwsSasaran[$kategori->id][$wk->wilayah_id]['l'] ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>P</label>
                                        <input type="number"
                                            name="jumlah[{{ $kategori->id }}][{{ $wk->wilayah_id }}][p]"
                                            class="form-control"
                                            value="{{ $pwsSasaran[$kategori->id][$wk->wilayah_id]['p'] ?? '' }}">
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

@endsection