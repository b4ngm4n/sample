<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('dashboard.page.index', compact('permissions'));
    }
}
