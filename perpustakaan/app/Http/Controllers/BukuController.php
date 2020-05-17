<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use Validator;
use Alert;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::all();
        return view('buku.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'kode_buku' => 'required|max:7',
            'judul' => 'required|max:30',
            'pengarang' => 'required|max:15',
            'jumlah' => 'required|max:3'
        ]);
        //var_dump($_POST);
        if ($validator->fails()) {
            return redirect('buku/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        //var_dump($request);
        $buku = new Buku();
        $simpan = $buku->create($request->all());
        if ($simpan) {
            Alert::success('Informasi', 'Data Berhasil Disimpan');
            return redirect()->route('buku.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Disimpan');
            return redirect()->route('buku.index');
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
        $data = Buku::findOrFail($id);
        return view('buku.edit', compact('data'));
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
        // $validator = Validator::make($request->all(),[
        //     'kode_buku' => 'required|max:7',
        //     'judul' => 'required|max:30',
        //     'pengarang' => 'required|max:15',
        //     'jumlah' => 'required|max:3'
        // ]);
        // //var_dump($_POST);
        // if ($validator->fails()) {
        //     return redirect('buku/update')
        //             ->withErrors($validator)
        //             ->withInput();
        // }

        $buku = Buku::findOrfail($id);
        $edit = $buku->update($request->all());
        if ($edit) {
            Alert::success('Informasi', 'Data Berhasil Diupdate');
            return redirect()->route('buku.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Diupdate');
            return redirect()->route('buku.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Buku::findOrfail($id);
        $hapus = $data->delete();
        if ($hapus) {
            Alert::success('Informasi', 'Data Berhasil Dihapus');
            return redirect()->route('buku.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Dihapus');
            return redirect()->route('buku.index');
        }
    }
}
