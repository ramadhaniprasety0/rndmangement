<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('payment_status')->nullable(); // Status pembayaran (misalnya: 'paid', 'pending')
            $table->string('payment_method')->nullable(); // Metode pembayaran (misalnya: 'bank', 'e-wallet', dll)
            $table->string('payment_reference')->nullable(); // Referensi pembayaran (ID transaksi)
            $table->timestamp('payment_date')->nullable(); // Tanggal pembayaran
        });
    }

    public function down()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->dropColumn('payment_status');
            $table->dropColumn('payment_method');
            $table->dropColumn('payment_reference');
            $table->dropColumn('payment_date');
        });
    }
};
