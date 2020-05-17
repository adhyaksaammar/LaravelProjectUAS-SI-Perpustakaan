<?php

namespace App\Http\Controllers;

use App\Denda;
use Illuminate\Http\Request;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Denda::getData();
        return view('denda/index', compact('data'));
        //return response()->json(['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->get('id');
        $data = Denda::pilih($id);
        foreach ($data as $value);

        $denda = $value->terlambat * 2000;
        $tggl = date('y-m-d');

        $simpan = new Denda();
        $simpan->no_kembali = $id;
        $simpan->jumlah_denda = $denda;
        $simpan->tanggal_bayar = $tggl;
        $ok = $simpan->save();
        
        if ($ok) {
            return response()->json(['sukses' => 'Berhasil']);
        }else{
            return response()->json(['sukses' => 'Gagal']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function show(Denda $denda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function edit(Denda $denda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Denda $denda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Denda  $denda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Denda $denda)
    {
        //
    }
}
