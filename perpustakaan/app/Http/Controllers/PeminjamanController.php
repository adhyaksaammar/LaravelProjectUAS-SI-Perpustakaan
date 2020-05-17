<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Peminjaman;
use App\Buku;
use App\Anggota;
use App\Pegawai;
use Validator;
use Alert;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Peminjaman::all();
        return view('peminjaman.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = DB::table('bukus')
                ->groupBy('kategori')
                ->get();
        $anggota = Anggota::all();
        $pegawai = Pegawai::all();
        return view('peminjaman.tambah', compact('buku', 'anggota', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $buku = $request->kode_buku;
        $jmlbk = count($buku);
        $id_buku = implode(',',$buku);

        for ($i=0; $i < $jmlbk ; $i++) { 
            $bk = DB::table('bukus')->where('kode_buku',$buku[$i])->get();
            foreach ($bk as $value) {
                $selisih = (int)$value->jumlah - 1;
                $update = Buku::where('kode_buku',$buku[$i])->update(['jumlah'=>$selisih]);
            }
        }
        // var_dump($id_buku.''.);

        // $hasil = $request->judul;
        // $idBuku = DB::table('bukus')
        //         ->where('judul',$hasil)
        //         ->get();
        // foreach ($idBuku as $value);

        // var_dump($_POST);
        $id_buku = $value->id;
        $data = new Peminjaman();
        $data->no_pinjam = $request->no_pinjam;
        $data->id_anggota = $request->id_anggota;
        $data->id_buku = $id_buku;
        $data->tanggal_pinjam = $request->tanggal_pinjam;
        $data->lama_pinjam = $request->lama_pinjam;
        $data->tanggal_kembali = $request->tanggal_kembali;
        $data->id_pegawai = $request->id_pegawai;
        $sukses = $data->save();
        if ($sukses) {
            return redirect()->route('peminjaman.index');
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
        $data = Peminjaman::findOrfail($id);
        return view ('peminjaman.edit',compact('data'));
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
        $data = Peminjaman::findOrfail($id);
        $edit = $data->update($request->all());
        if ($edit) {
            Alert::success('Informasi', 'Data Berhasil Diupdate');
            return redirect()->route('peminjaman.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Diupdate');
            return redirect()->route('peminjaman.index');
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
        $data = Peminjaman::findOrfail($id);
        $hapus = $data->delete();
        if ($hapus) {
            Alert::success('Informasi', 'Data Berhasil Dihapus');
            return redirect()->route('peminjaman.index');
        }else{
            Alert::error('Error', 'Ups Data Gagal Dihapus');
            return redirect()->route('peminjaman.index');
        }
    }

    public function jabar(Request $request)
    {
        $pilih = $request->get('pilih');
        $nilai = $request->get('nilai');
        $depend = $request->get('depend');

        $data = DB::table('bukus')
            ->where($pilih,$nilai)
            ->groupBy($depend)
            ->get();
        $hasil = ' <option value="">Pilih Kode Buku'.ucfirst($depend).'</option>';
        foreach ($data as $value) {
            $hasil .= ' <option value="'.$value->$depend.'">'.$value->$depend.'</option>';
        }
        echo $hasil;
    }
}
