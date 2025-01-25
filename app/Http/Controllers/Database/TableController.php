<?php

namespace App\Http\Controllers\Database;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function index()
    {
        $tables = DB::select('SHOW TABLES');
        $databaseName = env('DB_DATABASE');

        // Menyesuaikan nama key dari hasil query
        $tables = array_map(function ($table) use ($databaseName) {
            return $table->{'Tables_in_' . $databaseName};
        }, $tables);

        // Mengambil data isi masing-masing tabel
        $tableData = [];
        foreach ($tables as $table) {
            $tableData[$table] = DB::table($table)->get();
        }

        return view('dashboard.page.database.table.index', compact('tables', 'tableData'));
    }
}
