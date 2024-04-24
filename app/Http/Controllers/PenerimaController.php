<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimas = Penerima::all();

        return view('adminPage.components.dataPenerima.index', compact('penerimas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPage.components.dataPenerima.create');
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
            'nama_instansi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Penerima::create($data);

        return redirect('/master/data-penerima')->with('success', 'Data Penerima Berhasil Ditambahkan');
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
        $penerima = Penerima::find($id);

        return view('adminPage.components.dataPenerima.edit', compact('penerima'));
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
            'nama_instansi' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Penerima::find($id)->update($data);

        return redirect('/master/data-penerima')->with('success', 'Data Penerima Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penerima::destroy($id);

        return redirect('/master/data-penerima')->with('success', 'Data Penerima Berhasil Dihapus');
    }
}
