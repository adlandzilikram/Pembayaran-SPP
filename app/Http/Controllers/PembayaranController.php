<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use PDF;
use App\Models\Pembayaran;
use App\Models\Spp;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\ViewBayar;
use App\Models\ViewSiswa;
use App\Models\user;
use App\Models\History;
use Auth;
use Carbon\Carbon;

class PembayaranController extends Controller
{
    public function index()
    {
        $viewpembayarans = History::latest()->paginate(5);
      
        return view('pembayarans.index', compact('viewpembayarans'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $spp = Spp::all();      
        $petugas = Petugas::all();     
        $siswa = Siswa::all();     
        $user = User::all();     
        $viewsiswa = ViewSiswa::all();     
        return view('pembayarans.create', compact('spp', 'petugas', 'siswa', 'user', 'viewsiswa'));
    }

    public function store(Request $request)
    {   

        $siswa = Siswa::where('nisn', '=', $request->nisn)->first();
        // dd($request->nisn);
        $spps = Spp::where('id_spp', '=', $siswa->id_spp)->first();
        

        $bln = ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];

        $transaksi = Pembayaran::where('nisn', '=', $request->nisn)->get();

        if (sizeof($transaksi) == 0) :
            $bulan = 6;
            $tahun = substr($spps->tahun, 0, 4);
        else :
            $a = array_key_last(end($transaksi));

            $akhir = $transaksi[$a];

            $a = array_search($akhir->bulan_dibayar, $bln);

            if ($a == 11) :
                $bulan = 0;
                $tahun = $akhir->tahun_dibayar + 1;
            else :
                $bulan = $a + 1;
                $tahun = $akhir->tahun_dibayar;
            endif;
        endif;

        if ($request->jumlah_bayar < $spps->nominal) :
            return back()->with(['error' => 'Uang yg anda masukan kurang']);
        endif;

        $pembayaranSimpan = Pembayaran::create([
            'id_petugas' => auth()->user()->id,
            'nisn' => $request->nisn,
            'tgl_bayar' => Carbon::now(),
            'bulan_dibayar' => $bln[$bulan],
            'tahun_dibayar' => $tahun,
            'id_spp' => $siswa->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar
        ]);
   
        if ($pembayaranSimpan) {
            return redirect('/pembayarans')->with(['success' => 'Berhasil Disimpan']);
        } else {
            return redirect('/pembayarans')->with(['Error' => 'Gagal Disimpan']);
        }




















        // $transaksi = Pembayaran::where('nisn', $request->nisn)->get();

        // $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Okotober', 'November', 'Desember'];

        // if (sizeof($transaksi) == 0) {
        //     $urutan = 6;
        // } else {
        //     $a = array_key_last(end($transaksi));

        //     $akhir = $transaksi[$a];

        //     $a = array_search($akhir->bulan_dibayar, $months);

        //     if ($a == 11) {
        //         $urutan = 0;
        //     } else {
        //         $urutan = $a + 1;
        //     }
        // }


        // $siswa = ViewSiswa::where('nisn', $request->nisn)->first();
        // $spp = Spp::where('id_spp', $siswa->id_spp)->first();

        // if ($request->jumlah_bayar < $spp->nominal) {
        //     return redirect('pembayarans/')->with('error', 'Uangnya Kurang :(');
        // } elseif ($request->jumlah_bayar >= $spp->nominal) {
        //     $kembalian = $request->jumlah_bayar - $spp->nominal;
        
        // Pembayaran::create([
        //     'id_petugas' => Auth::user()->id,
        //     'nisn' => $request->nisn,
        //     'tgl_bayar' => Carbon::now()->timezone('Asia/jakarta'),
        //     'bulan_dibayar' => $months[$urutan],
        //     'tahun_dibayar' => $siswa->tahun,
        //     'id_spp' => $spp->id_spp,
        //     'jumlah_bayar' => $request->jumlah_bayar,
        // ]);
 
    //     return redirect()->route('pembayarans.index')
    //                     ->with('success','Pembayaran created successfully.');
    // }
}

public function show($id)
{
    $pembayaran = Pembayaran::where('id_pembayaran', $id)->first();
    return view('pembayarans.show',compact('pembayaran'));
}

    public function edit($id)
    {
        $spp = Spp::all();      
        $petugas = Petugas::all();     
        $siswa = Siswa::all();     
        $user = User::all();     
        $pembayaran = Pembayaran::where('id_pembayaran', $id)->first();
        return view('pembayarans.edit',compact('pembayaran', 'spp', 'petugas', 'siswa', 'user'));
    }

    public function update(Request $request, $id)
    {

        Pembayaran::where('id_pembayaran', $id)->update([
                'id_petugas' => Auth::user()->id,
                'nisn' => $request->nisn,
                'tgl_bayar' => Carbon::now()->timezone('Asia/jakarta'),
                'bulan_dibayar' => $request->bulan_dibayar,
                'tahun_dibayar' => $request->tahun_dibayar,
                'id_spp' => $request->id_spp,
                'jumlah_bayar' => $request->jumlah_bayar,
            ]);
        
 
        return redirect('/pembayarans')
                        ->with('success','Pembayaran updated successfully');
    }

    public function destroy($id)
    {
        $pembayaran = Pembayaran::where('id_pembayaran', $id);
        // dd($pembayaran);
        $pembayaran->delete();
 
        return redirect()->route('pembayarans.index')
                        ->with('success','Pembayaran deleted successfully');
    }

    public function getData($nisn)
    {
        $siswa = Siswa::where('nisn', '=', $nisn)->first();
        $spp = Spp::where('id_spp', '=', $siswa->id_spp)->first();
        $pembayaran = Pembayaran::where('nisn', '=', $siswa->nisn)
            ->latest()
            ->first();

        $data = [
            'harga' => $spp->nominal,
            'bulan' => $pembayaran->bulan_dibayar,
            'tahun' => $pembayaran->tahun_dibayar,
        ];

        return response()->json($data);
    }

    public function cetak_pdf()
    {
    	$history = History::all();
 
    	$pdf = PDF::loadview('history_pdf',['history'=>$history]);
    	return $pdf->download('laporan-history-pdf');
    }

//     public function cetak_pdf()
// {
// 	$history = History::all();
 
// 	$pdf = PDF::loadview('history_pdf',['history'=>$history]);
// 	return $pdf->download('laporan-history-pdf');
// }

public function History()
{
    if(auth()->user()->is_admin=='1' OR auth()->user()->is_admin=='2')
        {
            $views = PembayaranView::all();
        }
        else
        {
            $user = auth()->user()->email;
            $siswa = Siswa::where('email', $user)->pluck('nisn');
            $views = PembayaranView::where('nisn', $siswa)->get();
        }
        return view('pembayarans.history', compact('views'));
}
}
