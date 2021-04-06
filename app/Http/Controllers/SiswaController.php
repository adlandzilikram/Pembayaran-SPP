<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\ViewSiswa;
use App\Models\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $siswas = Siswa::latest()->paginate(5);
            $view = ViewSiswa::all();
     
            return view('siswas.index',compact('siswas', 'view'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswas.create', compact('kelas', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);
 
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $siswaSimpan = Siswa::create($data);

        if ($siswaSimpan) {
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => 3,
            ]);

            return redirect('/siswas')->with(['sukses' => 'Berhasil Di Simpan']);
        } else {
            return redirect('/siswas')->with(['gagal' => 'Gagal Di Simpan']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        return view('siswas.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        $siswa = Siswa::find($id);
        return view('siswas.edit',compact('siswa', 'spp', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required',
        ]);

        Siswa::find($id)->update($request->all());
 
        return redirect('/siswas')
                        ->with('success','Siswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nisn)
    {
        $siswa = Siswa::find($nisn);
        $siswa->delete();
 
        return redirect()->route('siswas.index')
                        ->with('success','Siswa deleted successfully');
    }
}