<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('permissions', 'roles', 'biodata')->get();
        return view('dashboard.page.user.index', compact('users'));
    }

    public function create()
    {
        $permissions = Permission::all();
        $roles = Role::with('permissions')->get();

        return view('dashboard.page.user.create', compact('permissions', 'roles'));
    }

    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            
        ]);

        if ($validasi->fails()) {
            
        }

        return redirect()->route('user.index');
    }

    public function edit(User $user)
    {
        return view('dashboard.page.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validasi = Validator::make($request->all(), [
            
        ]);

        if ($validasi->fails()) {
            
        }

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index');
    }

    // PERMISSIONS
    public function permissions(User $user)
    {
        
    }
}
