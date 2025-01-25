<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PWSController extends Controller
{
    public function index()
    {
        return view('dashboard.page.pws.index');
    }
}
