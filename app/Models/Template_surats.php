<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template_surats extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = ['tipesurats_id', 'file_path'];

    public function surat()
    {
        return $this->belongsTo(Surat::class, 'tipesurats_id');
    }
}
