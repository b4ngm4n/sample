<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Models\Bulan;
use Illuminate\Http\Request;

class BulanController extends Controller
{
    public function index()
    {
        $bulans = Bulan::all();
        return view('dashboard.page.bulan.index');
    }
}
