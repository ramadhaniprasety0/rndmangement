<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Kas extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'transaksi_kas';

    // Tentukan kolom yang dapat diisi
    protected $fillable = [
        'jenis_transaksi',
        'jumlah',
        'kategori',
        'tanggal',
        'deskripsi',
    ];

    // Tentukan tipe data kolom jika diperlukan
    protected $casts = [
        'tanggal' => 'date',
        'jumlah' => 'decimal:2',
    ];
}
