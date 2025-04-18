<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class surat_masuk extends Model
{
    //
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
