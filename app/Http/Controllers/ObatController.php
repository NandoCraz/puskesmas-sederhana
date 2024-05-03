<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::all();
        return view('adminPage.components.dataObat.index', compact('obats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPage.components.dataObat.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_satuan' => 'required',
            'stok_obat' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        Obat::create($data);
        
        return redirect('/master/data-obat')->with('success', 'Data Obat Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obat = Obat::find($id);

        return view('adminPage.components.dataObat.edit', compact('obat'));
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
        $data = $request->validate([
            'nama_obat' => 'required',
            'jenis_obat' => 'required',
            'harga_satuan' => 'required',
            'stok_obat' => 'required',
            'tanggal_kadaluarsa' => 'required',
        ]);

        Obat::find($id)->update($data);

        return redirect('/master/data-obat')->with('success', 'Data Obat Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Obat::destroy($id);

        return redirect('/master/data-obat')->with('success', 'Data Obat Berhasil Dihapus');
    }

    public function getObat()
    {
        $obats = Obat::all();
        return response()->json([
            'obats' => $obats
        ]);
    }
}
