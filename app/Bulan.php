<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bulan extends Model
{
    protected $table = 'bulans';

    public function SPP()
    {
        return $this->hasMany(SPP::class,'id');
    }
}
