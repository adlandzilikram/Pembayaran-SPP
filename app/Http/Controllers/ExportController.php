<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExports;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    function exports()
    {
        return Excel::download(new HistoryExports, 'history.xlsx');
    }
}
