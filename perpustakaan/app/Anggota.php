<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table ='anggotas';
    protected $fillable = [
    		 'id',
             'id_anggota',
    		 'nama',
    		 'fakultas',
    		 'tempat_lahir',
    		 'no_hp',
    		 'jenis_kelamin',
    		 'tanggal_lahir',
    		 'status_pinjam',
    		 'alamat'
    ];
}
