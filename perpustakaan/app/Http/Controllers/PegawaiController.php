<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use Validator;
use Alert;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Pegawai::all();
        return view('pegawai.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai.tambah');
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
            'id_pegawai' => 'required|max:19',
            'nama' => 'required|max:8',
            'jenis_kelamin' => 'required',
            'no_hp' => 'required|max:12',
            'alamat' => 'required|max:10'
        ]);
        
        if ($validator->fails()) {
            return redirect('pegawai/create')
                    ->withErrors($validator)
                    ->withInput();
        }

        // var_dump($_POST);
        $data = new Pegawai();
        $hasil = $data->create($request->all());
        if ($hasil) {
            Alert::success('Informasi', 'Data Berhasil Disimpan');
            return redirect()->route('pegawai.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Disimpan');
            return redirect()->route('pegawai.index');
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
        $data = Pegawai::findOrfail($id);
        return view ('pegawai.edit',compact('data'));
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
        $data = Pegawai::findOrfail($id);
        $edit = $data->update($request->all());
        if ($edit) {
            Alert::success('Informasi', 'Data Berhasil Diupdate');
            return redirect()->route('pegawai.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Diupdate');
            return redirect()->route('pegawai.index');
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
        $data = Pegawai::findOrfail($id);
        $hapus = $data->delete();
        if ($hapus) {
            Alert::success('Informasi', 'Data Berhasil Dihapus');
            return redirect()->route('pegawai.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Dihapus');
            return redirect()->route('pegawai.index');
        }
    }
}
