<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\AkunPengguna;
use App\Models\Biodata;
use App\Models\Faskes;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('dashboard.page.user.index', compact('users'));
    }

    public function create()
    {
        $wilayahs = Wilayah::where('jenis_wilayah', 'kelurahan')->get();
        $roles = Role::with('permissions')->get();
        $faskes = Faskes::all();

        return view('dashboard.page.user.create', compact('faskes', 'roles', 'wilayahs'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_depan' => 'required',
            'nik' => 'required|unique:biodatas,nik',
            'email' => 'required|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required',
            'roles' => 'required',
            'faskes' => 'required'
        ]);

        if ($validasi->fails()) {
            toast('Data tidak valid', 'error');
            return redirect()->back();
        }

        $roles = Role::where('uuid', $request->roles)->first()->id;
        $faskes = Faskes::where('uuid', $request->faskes)->first()->id;

        $biodata = new Biodata();
        $biodata->nama_depan = $request->nama_depan;
        $biodata->nama_belakang = $request->nama_belakang ?? '';
        $biodata->nama_lengkap = $request->nama_depan . ' ' . $request->nama_belakang  ?? '';
        $biodata->slug = Str::slug($request->nama_depan . ' ' . $request->nama_belakang . ' ' . Biodata::latest()->first()->id + 1);
        $biodata->tempat_lahir = $request->tempat_lahir ?? '';
        $biodata->tanggal_lahir = $request->tanggal_lahir ?? '';
        $biodata->agama = $request->agama ?? '';
        $biodata->pekerjaan = $request->pekerjaan ?? '';
        $biodata->no_hp = $request->no_hp ?? '';
        $biodata->nik = $request->nik ?? '';
        $biodata->jenis_kelamin = $request->jenis_kelamin ?? '';
        $biodata->save();

        $user = new User();
        $user->biodata_id = $biodata->id;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        $user->roles()->sync($roles);

        $akunPengguna = new AkunPengguna();
        $akunPengguna->user_id = $user->id;
        $akunPengguna->faskes_id = $faskes;
        $akunPengguna->save();

        toast('User berhasil ditambahkan', 'success');
        return redirect()->route('user.index');
    }

    public function show(User $user)
    {

        return view('dashboard.page.user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('dashboard.page.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validasi = Validator::make($request->all(), []);

        if ($validasi->fails()) {
        }

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    public function listPermissions(User $user)
    {
        return view('dashboard.page.user.permissions', compact('user'));
    }

    // PERMISSIONS
    public function storePermissions(User $user) {}

    public function assignRoles(User $user) {}
}
