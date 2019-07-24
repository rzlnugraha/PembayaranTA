<?php

namespace App;
use App\Kelas;

use Illuminate\Database\Eloquent\Model;

class Angkatan extends Model
{
    protected $table = "Angkatan";

    public function Kelas()
    {
        return $this->hasMany(Kelas::class, 'id');
    }

    public function Siswa()
    {
        return $this->hasMany(Siswa::class, 'id');
    }

    public function SPP()
    {
        return $this->hasMany(App::class, 'id');
    }
}
