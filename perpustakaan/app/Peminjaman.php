<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table ='peminjamen';
    protected $fillable = ['id',
							'no_pinjam',
							'id_anggota',
							'tanggal_pinjam',
							'lama_pinjam',
							'tanggal_kembali',
							'id_pegawai'
						];

	public static function join()
	{
		$data = DB::table('peminjamen')
				->join('anggotas','peminjamen.id_anggota','=','anggotas.id')
				->join('pegawais','peminjamen.id_pegawai','=','pegawais.id')
				->select('peminjamen.*','anggotas.nama')
				->get();
		return $data;
	}

	public static function cari($id)
	{
		$data = DB::table('peminjamen')
				->join('anggotas','peminjamen.id_anggota','=','anggotas.id')
				->join('pegawais','peminjamen.id_pegawai','=','pegawais.id')
				->select('peminjamen.*','anggotas.nama')
				->where('peminjamen.id',$id)
				->first();
		return $data;
	}
}
