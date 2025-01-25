@extends('dashboard.app')

@section('title', 'Wilayah')

@section('breadcrumbTitle', 'Wilayah')

@section('breadcrumbActive', 'List Wilayah')

@section('content')

<div class="col-12">
   <div class="card">
      <div class="card-title">
         <h4 class="title ms-4 mt-4 float-start">List Wilayah</h4>
         @can('permission', 'create-wilayah')
         <a href="{{ route('wilayah.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
               class="bx bxs-plus-square me-2"></i>Tambah Wilayah</a>
         @endcan
      </div>

      <div class="card-body">
         <table id="selection-datatable"
            class="table dt-responsive nowrap w-100 table-striped table-bordered nowrap data-table-area">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Nama Wilayah</th>
                  <th>Kode Wilayah</th>
                  <th>Jenis Wilayah</th>
                  <th>Alamat Wilayah</th>
                  <th>Tingkatan</th>
                  <th>Aksi</th>
               </tr>
            </thead>


            <tbody>
               @foreach ($wilayahs as $wilayah)
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $wilayah->nama_wilayah }}</td>
                  <td>{{ $wilayah->kode_wilayah }}</td>
                  <td><span class="badge bg-primary">{{ $wilayah->jenis_wilayah }}</span></td>
                  <td>{{ $wilayah->alamat_wilayah }}</td>
                  <td>{{ $wilayah->depth }}</td>
                  <td></td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>

@endsection