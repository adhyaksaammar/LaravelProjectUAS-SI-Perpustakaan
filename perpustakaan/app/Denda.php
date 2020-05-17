<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Denda extends Model
{
    protected $table = 'dendas';
    protected $fillable = [
    	'id',
    	'no_kembali',
    	'jumlah_denda',
    	'tanggal_bayar'
    ];

    public static function getData()
	{
		$data = 
				DB::table('kembalis')
				->join('peminjamen','kembalis.no_pinjam','=','peminjamen.id')
				->join('pegawais','kembalis.admin','=','pegawais.id')
				->join('anggotas','peminjamen.id_anggota','=','anggotas.id')
				->select('kembalis.*','kembalis.id as id_kembali','peminjamen.*','anggotas.*','pegawais.nama')
				->where('kembalis.status','terlambat')
				->get();
				return $data;
	}

	public static function pilih($id)
	{
		$data = 
				DB::table('kembalis')
				->join('peminjamen','kembalis.no_pinjam','=','peminjamen.id')
				->join('pegawais','kembalis.admin','=','pegawais.id')
				->join('anggotas','peminjamen.id_anggota','=','anggotas.id')
				->select('kembalis.*','peminjamen.*','anggotas.*','pegawais.nama')
				->where('kembalis.id',$id)
				->get();
				return $data;
	}
}
