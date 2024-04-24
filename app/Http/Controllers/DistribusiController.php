<?php

namespace App\Http\Controllers;

use App\Models\Distribusi;
use App\Models\Obat;
use App\Models\Penerima;
use Illuminate\Http\Request;

class DistribusiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribusis = Distribusi::all();

        return view('adminPage.components.dataDistribusi.index', compact('distribusis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penerimas = Penerima::all();
        $obats = Obat::all();

        return view('adminPage.components.dataDistribusi.create', compact('penerimas', 'obats'));
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
            'id_obat' => 'required',
            'id_penerima' => 'required',
            'tanggal_terima' => 'required',
            'jumlah_terima' => 'required',
        ]);

        $obat = Obat::find($data['id_obat']);

        if ($data['jumlah_terima'] > $obat->stok_obat) {
            return back()->with('error', 'Jumlah terima tidak boleh melebihi stok obat');
        }

        Distribusi::create($data);

        return redirect('/master/data-distribusi')->with('success', 'Data Distribusi Berhasil Ditambahkan');
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
        $distribusi = Distribusi::find($id);
        $penerimas = Penerima::all();
        $obats = Obat::all();

        return view('adminPage.components.dataDistribusi.edit', compact('distribusi', 'penerimas', 'obats'));
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
            'id_obat' => 'required',
            'id_penerima' => 'required',
            'tanggal_terima' => 'required',
            'jumlah_terima' => 'required',
        ]);

        $obat = Obat::find($data['id_obat']);

        if ($data['jumlah_terima'] > $obat->stok_obat) {
            return back()->with('error', 'Jumlah terima tidak boleh melebihi stok obat');
        }

        Distribusi::find($id)->update($data);

        return redirect('/master/data-distribusi')->with('success', 'Data Distribusi Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Distribusi::destroy($id);

        return redirect('/master/data-distribusi')->with('success', 'Data Distribusi Berhasil Dihapus');
    }
}
