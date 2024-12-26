<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('permissions')->where('slug', '!=', 'administrator')->get();

        return view('dashboard.page.role.index', compact('roles'));
    }

    public function create()
    {
        return view('dashboard.page.role.create');
    }


    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required|',
        ], [
            'name.required' => 'Nama role harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $cekSlug = Role::pluck('slug')->contains(Str::slug($request->name));

        if ($cekSlug) {
            toast('Gagal menambahkan Role', 'error');
            return redirect()->back()->withErrors(['name' => 'Role sudah ada'])->withInput();
        }

        $role = new Role();
        $role->name = $request->name;
        $role->slug = Str::slug($request->name);
        $role->save();

        toast('Role berhasil ditambahkan', 'success');
        return redirect()->route('role.index');
    }

    public function show(Role $role)
    {
        // dd(auth()->user()->roles->contains('slug', 'administrator'));
        // Ambil semua permission dan kelompokkan berdasarkan kategori
        // $permissions = Permission::all()
        //     ->groupBy(function ($permission) {
        //         dd(explode('-', $permission->slug)[0]);
        //         // Asumsikan kategori diambil dari slug yang dipisah dengan '-'
        //         return explode('-', $permission->slug)[0]; // Misalnya: 'read-provinsi' -> 'provinsi'
        //     });
        // Grupkan permissions ke dalam kategori utama dan anak berdasarkan slug
        // $permissions = Permission::all()->groupBy(function ($permission) {
        //     $parts = explode('-', $permission->slug);
        //     return count($parts) > 1 ? $parts[1] : $parts[0]; // Ambil kategori utama (provinsi, kabupaten, dll.)
        // })->map(function ($group) {
        //     return $group->groupBy(function ($permission) {
        //         $parts = explode('-', $permission->slug);
        //         return count($parts) > 1 ? $parts[0] : 'general'; // Ambil sub-kategori seperti list, create, dll.
        //     });
        // });
        if (auth()->user()->roles->contains('slug', 'administrator')) {
            $permissions = Permission::all()->groupBy(function ($permission) {
                $parts = explode('-', $permission->slug);
                return count($parts) > 1 ? $parts[1] : $parts[0]; // Ambil kategori utama (provinsi, kabupaten, dll.)
            })
            ->sortKeys()
            ->map(function ($group) {
                return $group->groupBy(function ($permission) {
                    $parts = explode('-', $permission->slug);
                    return count($parts) > 1 ? $parts[0] : 'general'; // Ambil sub-kategori seperti list, create, dll.
                });
            });
        } else {
            $permissions = auth()->user()->roles->pluck('permissions')->flatten()->groupBy(function ($permission) {
                $parts = explode('-', $permission->slug);
                return count($parts) > 1 ? $parts[1] : $parts[0]; // Ambil kategori utama (provinsi, kabupaten, dll.)
            })
            ->sortKeys()
            ->map(function ($group) {
                return $group->groupBy(function ($permission) {
                    $parts = explode('-', $permission->slug);
                    return count($parts) > 1 ? $parts[0] : 'general'; // Ambil sub-kategori seperti list, create, dll.
                });
            });
        }
        
        // dd($permissions);
        return view('dashboard.page.role.show', compact('role', 'permissions'));
    }

    public function edit(Role $role)
    {
        return view('dashboard.page.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
        ], [
            'name.required' => 'Nama role harus diisi',
        ]);

        if ($validasi->fails()) {
            return redirect()->back()->withErrors($validasi)->withInput();
        }

        $cekSlug = Role::where('uuid', '!=', $role->uuid)->pluck('slug')->contains(Str::slug($request->name));

        if ($cekSlug) {
            toast('Role gagal ditambahkan', 'error');
            return redirect()->back()->withErrors(['name' => 'Role sudah ada'])->withInput();
        }

        // $role->permissions()->syncWithoutDetaching($request->permission);
        $role->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        toast('Role berhasil diubah', 'success');
        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        if ($role->slug !== 'administrator') {
            $role->delete();
            toast('Role berhasil dihapus', 'success');
            return redirect()->route('role.index');
        }

        toast('Role tidak dapat dihapus', 'error');
        return redirect()->route('role.index');
    }

    // PERMISSIONS
    public function permissions(Request $request, Role $role)
    {
        $validasi = Validator::make($request->all(), [
            'permissions.*' => 'required|exists:permissions,uuid'
        ], [
            'permissions.exists' => 'Hak Akses tidak ditemukan',
        ]);

        if ($validasi->fails()) {
            toast('Hak Akses tidak ditemukan', 'error');
            return redirect()->back();
        }

        if ($request->permissions == null) {
            $role->permissions()->detach();
            toast('Permission telah kosong', 'success');
            return redirect()->back();
        }

        $permissionId = Permission::whereIn('uuid', $request->permissions)->pluck('id');

        $role->permissions()->sync($permissionId);

        toast('Hak Akses berhasil ditambahkan', 'success');
        return redirect()->back();
    }
}
