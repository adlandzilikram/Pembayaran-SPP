<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Pembayaran;
use App\Models\Siswa;

use App\Exports\HistoryExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        // $pembayarans = Pembayaran::latest()->paginate(5);
        // $viewbayar = History::all();
        // return view('historys.index', compact('pembayarans', 'viewbayar'))
        // ->with('i', (request()->input('page', 1) - 1) * 5);

        if(auth()->user()->is_admin== 1 OR auth()->user()->is_admin== 2)
        {
            $viewbayar = History::all();
        }
        else
        {
            $siswa = Siswa::where('email', auth()->user()->email)->pluck('nisn');
            $viewbayar = History::where('nisn',$siswa)->paginate(36);
        }
        return view('historys.index', compact('viewbayar'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
        ;
    }  
    public function export_excel()
	{
		return Excel::download(new HistoryExport, 'history.xlsx');
	}
}
