@extends('dashboard.app')

@section('title', 'Table')

@section('breadcrumbTitle', 'Table')

@section('breadcrumbActive', 'List Table')

@section('content')
<div class="container">
   <h1 class="mb-4">Daftar Tabel dan Data</h1>

   @if(session('success'))
   <div class="alert alert-success">
       {{ session('success') }}
   </div>
   @endif

   <div class="mb-4">
       <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data dari semua tabel?')">
           @csrf
           <button type="submit" class="btn btn-danger">Hapus Semua Data</button>
       </form>
   </div>

   @foreach($tables as $table)
   <div class="card mb-4">
       <div class="card-header d-flex justify-content-between align-items-center">
           <h5 class="mb-0">{{ $table }}</h5>
           <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus semua data pada tabel {{ $table }}?')">
               @csrf
               <button type="submit" class="btn btn-danger btn-sm">Hapus Data Tabel</button>
           </form>
       </div>
       <div class="card-body">
           @if($tableData[$table]->isEmpty())
           <p class="text-muted">Tabel ini kosong.</p>
           @else
           <table class="table table-bordered">
               <thead>
                   <tr>
                       @foreach($tableData[$table][0] as $column => $value)
                       <th>{{ $column }}</th>
                       @endforeach
                   </tr>
               </thead>
               <tbody>
                   @foreach($tableData[$table] as $row)
                   <tr>
                       @foreach($row as $value)
                       <td>{{ $value }}</td>
                       @endforeach
                   </tr>
                   @endforeach
               </tbody>
           </table>
           @endif
       </div>
   </div>
   @endforeach
</div>
@endsection