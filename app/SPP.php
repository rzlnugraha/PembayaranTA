<?php

namespace App;
use App\Siswa;

use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    protected $table = 'SPP';

    protected $fillable = ['id_siswa','id_bulan','status_spp','biaya','bukti_tf','tgl_bayar'];

    public function Angkatan()
    {
        return $this->belongsTo(Angkatan::class, 'id_angkatan');
    }

    public function Bulan()
    {
        return $this->belongsTo(Bulan::class, 'id_bulan');
    }

    public function Siswa()
    {
        return $this->belongsTo(SPP::class, 'id_siswa');
    }
}