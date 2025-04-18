<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('total_tagihan', 10, 2); // Total tagihan anggota
            $table->decimal('saldo_hutang', 10, 2);  // Saldo hutang anggota
            $table->decimal('cicilan', 10, 2);       // Cicilan yang dibayar per periode
            $table->boolean('status_pembayaran')->default(false); // Sudah bayar atau belum
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan pengguna
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
