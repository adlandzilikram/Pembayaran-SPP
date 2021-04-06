<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $petugass = Petugas::latest()->paginate(5);
     
            return view('petugass.index',compact('petugass'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
               return view('petugass.create');
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
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]);
 

        
        Petugas::create($request->all());
 
        return redirect()->route('petugass.index')
                        ->with('success','Petugas created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $petugas = Petugas::find($id);
        return view('petugass.show',compact('petugas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = Petugas::find($id);
        return view('petugass.edit',compact('petugas'));
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
            'username' => 'required',
            'password' => 'required',
            'nama_petugas' => 'required',
            'level' => 'required',
        ]);

        Petugas::find($id)->update($request->all());
 
        return redirect('/petugass')
                        ->with('success','petugas updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_petugas)
    {
        $petugas = Petugas::find($id_petugas);
        $petugas->delete();
 
        return redirect()->route('petugass.index')
                        ->with('success','petugas deleted successfully');
    }
}