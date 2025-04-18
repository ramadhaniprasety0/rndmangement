<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class surat_keluar extends Model
{
    protected $guarded = ['id'];
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surats_id');
    }
}
