<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "Kelas";

    public function Angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'id_kelas');
    }
}
