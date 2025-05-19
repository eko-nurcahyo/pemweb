<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Pendaftaran;


class Beasiswa extends Model
{
    public function pendaftarans()
    {
    return $this->hasMany(Pendaftaran::class);
    }
    
}
