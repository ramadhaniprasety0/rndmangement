<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'product_id');  // Pastikan 'product_id' sesuai dengan foreign key yang digunakan
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
