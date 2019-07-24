<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kepsek extends Model
{
    protected $table = 'kepsek';
    protected $fillable = ['id_user','nama_kepsek','nik','tempat_lahir','agama','jenis_kelamin','tgl_lahir','lama_jabatan','alamat'
    ,'foto_kepsek'];
}
