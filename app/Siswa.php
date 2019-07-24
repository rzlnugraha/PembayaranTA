<?php

namespace App;
use App\Angkatan;
use App\Kelas;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'id_angkatan','id_kelas','nama_siswa','nis','tgl_lahir','agama','alamat','jenis_kelamin','id_user','tempat_lahir','foto_siswa'
    ];

    protected $table = 'Siswa';

    public function Angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function Kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function SPP()
    {
        return $this->hasMany(SPP::class, 'id_user');
    }
}
