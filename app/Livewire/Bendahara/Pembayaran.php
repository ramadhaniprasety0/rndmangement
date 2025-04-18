<?php

namespace App\Livewire\Bendahara;

use App\Models\Anggota;
use Livewire\Component;
use App\Models\Transaction;
use Midtrans\Snap;

class Pembayaran extends Component
{
    public $snapToken;
    public $anggota;
    public $anggotaId;
    public $transaction;

    

    public function success(Transaction $transaction)
    {
        // Pastikan anggota ada
        $anggota = $transaction->anggota;

        if (!$anggota) {
            // Jika anggota tidak ditemukan, berikan pesan error atau lakukan penanganan lain
            session()->flash('error', 'Anggota terkait tidak ditemukan.');
            return redirect()->route('bendahara');
        }

        // Verifikasi status transaksi dari Midtrans
        $status = request('transaction_status');

        if ($status == 'capture' || $status == 'settlement') {
            $transaction->status = 'success';  // Update status jadi 'success'

            // Periksa apakah saldo_hutang cukup
            if ($anggota->saldo_hutang >= $transaction->price) {
                // Kurangi saldo_hutang dan tambahkan saldo_bayar
                $anggota->saldo_hutang -= $transaction->price;
                $anggota->saldo_bayar += $transaction->price;

                // Simpan perubahan pada anggota
                $anggota->save();
            } else {
                // Jika saldo hutang tidak cukup, status transaksi bisa dianggap gagal
                $transaction->status = 'failed';
            }
        } else {
            $transaction->status = 'failed';  // Status lain dianggap gagal
        }

        $transaction->save();
        return redirect()->route('bendahara');
    }


    public function render()
    {
        // Mengirimkan snapToken yang sudah disiapkan ke view
        return view('livewire.bendahara.pembayaran', [
            'snapToken' => $this->snapToken,
            'anggota' => $this->anggota,
            'transaction' => $this->transaction,
        ]);
    }
}
