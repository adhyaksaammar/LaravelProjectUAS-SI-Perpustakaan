<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Kembali extends Model
{
    protected $table ='kembalis';
    protected $fillable = ['id',
    			 'no',
				 'no_pinjam',
				 'tanggal_pengembalian',
				 'terlambat',
				 'status',
				 'keterangan'
				];

	public static function join()
	{
		$data = 
				DB::table('kembalis')
				->join('peminjamen','kembalis.no_pinjam','=','peminjamen.id')
				->join('pegawais','kembalis.admin','=','pegawais.id')
				->join('anggotas','peminjamen.id_anggota','=','anggotas.id')
				->select('kembalis.*','peminjamen.*','anggotas.*','pegawais.nama')
				->get();
				return $data;
	}

	public static function getId()
	{
		return $getId = DB::table('kembalis')->orderBy('id','DESC')->take(1)->get();
	}
}
