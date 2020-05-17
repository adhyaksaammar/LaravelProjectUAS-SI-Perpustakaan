<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use Validator;
use Alert;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Anggota::all();
        return view('anggota.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.tambah');
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
            // 'nim' => 'required|max:19',
            'nama' => 'required|max:25',
            'fakultas' => 'required'
        ]);
        //var_dump($_POST);
        if ($validator->fails()) {
            return redirect('anggota/create')
                    ->withErrors($validator)
                    ->withInput();
        }
        $data = new Anggota();
        $simpan = $data->create($request->all());
        if ($simpan) {
            Alert::success('Informasi', 'Data Berhasil Disimpan');
            return redirect()->route('anggota.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Disimpan');
            return redirect()->route('anggota.index');
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
        // $datas = Anggota::findOrFail($id);
        // return view('anggota.detail',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Anggota::findOrFail($id);
        return view('anggota.edit',compact('data'));
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
        //     // 'nim' => 'required|string|max:19',
        //     'nama' => 'required|string|max:25',
        //     'no_hp' => 'required|string|max:5',
        //     'fakultas' => 'required'
        // ]);
        // //var_dump($_POST);
        // if ($validator->fails()) {
        //     return redirect('anggota/update')
        //             ->withErrors($validator)
        //             ->withInput();
        // }
        
        $data = Anggota::findOrfail($id);
        $edit = $data->update($request->all());
        if ($edit) {
            Alert::success('Informasi', 'Data Berhasil Diupdate');
            return redirect()->route('anggota.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Diupdate');
            return redirect()->route('anggota.index');
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
        $data = Anggota::findOrfail($id);
        $hapus = $data->delete();
        if ($hapus) {
            Alert::success('Informasi', 'Data Berhasil Dihapus');
            return redirect()->route('anggota.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Dihapus');
            return redirect()->route('anggota.index');
        }
    }
}
