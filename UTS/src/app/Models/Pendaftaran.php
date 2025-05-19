<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Beasiswa;

class Pendaftaran extends Model
{
    protected $fillable = ['user_id', 'beasiswa_id', 'dokumen', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function beasiswa()
    {
        return $this->belongsTo(Beasiswa::class);
    }
}
