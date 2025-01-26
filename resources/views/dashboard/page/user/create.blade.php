@extends('dashboard.app')

@section('title', 'Tambah User')

@section('breadcrumbTitle', 'Form Tambah User')

@section('breadcrumbParent')
<li class="breadcrumb-item"><a href="{{ route('user.index') }}">List User</a></li>
@endsection

@section('breadcrumbActive', 'Tambah')

@section('content')
<div class="col-12">
   <div class="card">

      <div class="card-body">
         <form action="{{ route('user.store') }}" method="POST" id="wizardForm">
            @csrf
            <ul class="wizard-nav mb-5">
               <li class="wizard-list-item">
                  <div class="list-item">
                     <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Biodata">
                        <i class="bx bx-file"></i>
                     </div>
                  </div>
               </li>
               <li class="wizard-list-item">
                  <div class="list-item">
                     <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="User">
                        <i class="bx bx-user-circle"></i>
                     </div>
                  </div>
               </li>

               <li class="wizard-list-item">
                  <div class="list-item">
                     <div class="step-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Instansi">
                        <i class="bx bx-buildings"></i>
                     </div>
                  </div>
               </li>
            </ul>

            <div class="wizard-form-tab">
               <div class="text-center mb-4">
                  <h5>Data Pribadi</h5>
                  <p class="card-title-desc">Silahkan melengkapi data pribadi</p>
               </div>
               <div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="nama_depan" name="nama_depan" class="form-label">Nama Depan <span
                                 class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="nama_depan" name="nama_depan" required>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="nama_belakang" class="form-label">Nama Belakang</label>
                           <input type="text" class="form-control" id="nama_belakang" name="nama_belakang">
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="nik" class="form-label">NIK <span class="text-danger">*</span></label>
                           <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                     </div>

                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                           <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                           <input type="text" id="tempat_lahir" class="form-control" name="tempat_lahir">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="jenis_kelamin" class="form-label">Jenis Kelamin <span
                                 class="text-danger">*</span></label>
                           <select name="jenis_kelamin" class="form-select" id="jenis_kelamin" required>
                              <option value="l">Laki - Laki</option>
                              <option value="p">Perempuan</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="agama" class="form-label">Agama</label>
                           <select name="agama" class="form-select" id="agama">
                              <option value="Islam">Islam</option>
                              <option value="Kristen">Kristen</option>
                              <option value="Katholik">Katholik</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Buddha">Buddha</option>
                              <option value="Konghucu">Konghucu</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="no_hp" class="form-label">No HP / Whatsapp <span
                                 class="text-danger">*</span></label>
                           <input type="text" id="no_hp" class="form-control" name="no_hp" required>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="pekerjaan" class="form-label">Pekerjaan</label>
                           <input type="text" id="pekerjaan" class="form-control" name="pekerjaan">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="mb-3">
                           <label for="jalan" class="form-label">Alamat</label>
                           <input type="text" id="jalan" class="form-control" name="jalan">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="mb-3">
                           <label for="wilayah" class="form-label">Wilayah</label>
                           <div class="mt-2">
                              <select name="wilayah" id="wilayah" class="select2 form-control w-100"
                                 style="width: 100%">
                                 <option value="">-- Pilih Wilayah Tinggal --</option>
                                 @foreach ($wilayahs as $wilayah)
                                 <option value="{{ $wilayah->uuid }}">{{ $wilayah->nama_wilayah . ' - '.
                                    $wilayah->kode_wilayah }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <!-- wizard-form-tab -->
            <div class="wizard-form-tab">
               <div>
                  <div class="text-center mb-4">
                     <h5>Akun Pengguna</h5>
                     <p class="card-title-desc">Silahkan lengkapi data akun</p>
                  </div>
                  <div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="mb-3">
                              <label for="roles" class="form-label">Level <span class="text-danger">*</span></label>
                              <div class="mt2">
                                 <select name="roles" id="roles" class="select2 form-control w-100" style="width: 100%" required>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->uuid }}">{{ $role->name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="mb-3">
                              <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="username" name="username" required>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="mb-3">
                              <label for="email" class="form-label">Email Aktif <span class="text-danger">*</span></label>
                              <input type="email" class="form-control" id="email" name="email" required>
                           </div>
                        </div>

                        <div class="col-lg-6">
                           <div class="mb-3">
                              <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="password" name="password" required>
                           </div>
                        </div>
                     </div>
                     
                  </div>
               </div>
            </div>
            <!-- wizard-form-tab -->

            <div class="wizard-form-tab">
               <div>
                  <div class="text-center mb-4">
                     <h5>Data Tempat Kerja</h5>
                     <p class="card-title-desc">Silahka Lengkapi Data Tempat Kerja</p>
                  </div>
                  <div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="mb-3">
                              <label for="faskes" class="form-label">Nama Fasyankes Tempat Bekerja <span class="text-danger">*</span></label>
                              <select name="faskes" id="faskes" class="select2 form-control w-100" style="width: 100%" required>
                                 <option value="">-- Pilih Faskes Bekerja--</option>
                                 @foreach ($faskes as $item)
                                     <option value="{{ $item->uuid }}">{{ $item->nama_faskes }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </div><!-- end form -->

               </div>
            </div>
            <!-- wizard-form-tab -->

            <div class="d-flex align-items-start gap-3 mt-4">
               <button type="button" class="btn btn-primary btn-lg" id="prevBtn"
                  onclick="nextPrev(-1)">Previous</button>
               <button type="submit" class="btn btn-primary btn-lg ms-auto" id="nextBtn"
                  onclick="nextPrev(1)">Next</button>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection