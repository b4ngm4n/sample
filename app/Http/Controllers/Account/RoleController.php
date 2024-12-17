<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount('permissions')->get();
        
        return view('dashboard.page.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('dashboard.page.role.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            
        ]);

        if ($validasi->fails()) {
            
        }

        return redirect()->route('role.index');
    }

    public function edit(Role $role)
    {
        return view('dashboard.page.role.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        $validasi = Validator::make($request->all(), [
            'permissions' => 'required|array',
        ]);

        if ($validasi->fails()) {
            
        }

        $role->permissions()->syncWithoutDetaching($request->permission);

        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('role.index');
    }
}

