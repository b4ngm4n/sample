@extends('dashboard.app')

@section('title', 'User')

@section('breadcrumbTitle', 'User')

@section('breadcrumbActive', 'List User')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-title">
            <a href="{{ route('user.create') }}" class="btn btn-primary float-end mt-4 me-4"><i
                    class="bx bxs-plus-square me-2"></i>Tambah User</a>
        </div>
        <div class="card-body">

            <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap data-table-area">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>


                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->biodata->nama_lengkap }}</td>
                        <td>{{ $user->username }}</td>
                        <td><span class="badge text-bg-primary">{{ $user->roles()->pluck('name')->implode(', ')
                                }}</span></td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.show', $user->uuid) }}" class="btn btn-sm btn-info"><i
                                    class="ti-info-alt"></i></a>

                            <a href="{{ route('user.edit', $user->uuid) }}" class="btn btn-sm btn-warning"><i
                                    class="ti-pencil-alt"></i></a>
                            <button class="btn btn-danger btn-sm"><i class="ti-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection