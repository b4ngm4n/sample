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
                              <h6>{{ auth()->user()->biodata->nama_lengkap . ' - '. (auth()->user()->roles->pluck('slug')->first() == 'administrator' ? 'Administrator' : auth()->user()->akunPengguna->pluck('faskes.nama_faskes')->implode(',')) }}</h6>
                              <h2 class="mb-4">Kelola data apapun jadi<br>
                              Lebih mudah</h2>

                              <span class="badge bg-primary p-2 fs-6">Super App - Dinas Kesehatan Kota Gorontalo</span>
                          </div>
                          <div class="dash-image">
                              <img src="{{ asset('assets/img/bg-img/banner.png') }}" alt="">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          
      </div>
  </div>
</div>

@endsection