@extends('dashboard.app')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-area">
  <div class="container-fluid">
      <div class="row g-4">
          <div class="col-12">
              <div class="card dash-banner-img">
                  <div class="card-body p-4 p-lg-5">
                      <div class="dash-banner d-flex justify-content-between align-items-center">
                          <div class="dash-banner-text mb-4">
                              <h6>{{ auth()->user()->biodata->nama_lengkap . ' - '. (auth()->user()->roles->pluck('slug')->first() == 'administrator' ? 'Administrator' : auth()->user()->faskes->nama_faskes) }}</h6>
                              <h2 class="mb-4">Kelola data apapun jadi<br>
                              Lebih mudah</h2>

                              <span class="badge bg-primary p-2 fs-6 text-wrap">Super App - Dinas Kesehatan Kota Gorontalo</span>
                          </div>
                          <div class="dash-image">
                              <img src="{{ asset('assets/img/bg-img/banner.png') }}" alt="">
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <div class="col-12">
            <div class="card">
                <div class="mt-3 me-3 ms-3 d-flex justify-content-between">
                    <div>
                        <h6>Rekapan Tahunan</h6>
                    </div>
                    <div>
                        {{-- <form action="filter" method="get">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select name="tahun" id="tahun" class="form-control">
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-primary" type="submit">Filter</button>
                                </div>
                            </div>
                        </form> --}}
                    </div>
                </div>
                <div class="card-body">
                    COMMING SOON
                </div>
            </div>
        </div>
          
      </div>
  </div>
</div>

@endsection