<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kembali;
use App\Peminjaman;
use App\Buku;
use DB;
use Validator;
use Alert;

class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kembali::join();
        $idPinjam = Peminjaman::all();

        return view('kembali.index', compact('data','idPinjam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Peminjaman::all();
        $buku = DB::table('bukus')
                ->groupBy('kategori')
                ->get();
        return view('kembali.tambah', compact('data','buku'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // var_dump($_POST);

        $id = Kembali::getId();
        
        // var_dump($_POST);

        foreach ($id as $value);
        $idlm = $value->id;
        $idbaru = $idlm + 1;

        $blt = date('m-Y');
        $no_pengembalian = 'KMBL/'.$idbaru.'/'.$blt;

        $data = new Kembali();
        $data->no = $no_pengembalian;
        $data->no_pinjam = $request->no_pinjam;
        $data->admin = $request->admin;
        $data->tanggal_pengembalian = $request->tanggal_pengembalian;

        //tambahan lama keterlambatan
        $data->terlambat = $request->terlambat;

        $data->status = $request->status;
        $data->keterangan = $request->keterangan;
        $simpan = $data->save();

        // $buku = $request->kode_buku;
        // $jmlbk = count([$buku]);
        // $id_buku = implode(',',[$buku]);

        // for ($i=0; $i < $jmlbk ; $i++) { 
        //     $bk = DB::table('bukus')->where('kode_buku',$buku[$i])->get();
        //     foreach ($bk as $value) {
        //         $selisih = (int)$value->jumlah + 1;
        //         $update = Buku::where('kode_buku',$buku[$i])->update(['jumlah'=>$selisih]);
        //     }
        // }

        if ($simpan) {
            $no_pinjam = $request->no_pinjam;
            $update = Peminjaman::find($no_pinjam);
            // $update->ok = 'ok';
            $update->save();
            alert()->success('Berhasil', 'Data Berhasil Disimpan');
            return redirect()->route('kembali.index');
        } else {
            alert()->error('ErrorAlert', 'Data Gagal Disimpan');
            return redirect()->route('kembali.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cari(Request $request)
    {
        $id = $request->get('id');
        $data = Peminjaman::cari($id);
        return response()->json(['data'=>$data]);
    }
}
