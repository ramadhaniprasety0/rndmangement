<?php

namespace App\Livewire\Bendahara;

use App\Models\Anggota;
use App\Models\Transaction;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PembayaranKas extends Component
{

    public $proses;

    public $user_nama;

    public $total_tagihan;

    public $saldo_bayar;

    public $transaction;

    public $snapToken;

    #[Validate('required|in:5000,10000,20000')]
    public $nominal_bayar;
    public function mount($id)
    {
        $this->proses = Anggota::find($id);

        if (!$this->proses) {
            $this->user_nama = $this->proses->user ? $this->proses->user->name : 'Nama Tidak Ditemukan';
            $this->total_tagihan = $this->proses->total_tagihan;
            $this->saldo_bayar = $this->proses->saldo_bayar;
        } else {
            $this->user_nama = 'Nama Tidak Ditemukan';
        }
    }

    public function bayarSekarang()
    {

        $transaction = Transaction::create([
            'user_id' => $this->proses->user_id,
            'product_id' => $this->proses->id,
            'price' => $this->nominal_bayar,
            'status' => 'pending',
        ]);

        $this->transaction = $transaction;

        // Set konfigurasi Midtrans
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => 'payment-' . uniqid() . '-' . $this->proses->id,
                'gross_amount' => $this->nominal_bayar
            ),
            'customer_details' => array(
                'first_name' => $this->proses->user->name,
                'email' => $this->proses->user->email,
                'phone' => $this->proses->no_tlpn
            )
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->snap_token = $snapToken;
        $transaction->save();

        return redirect()->route('bendahara.bayar-sekarang', ['transactionId' => $transaction->id]);

    }

    public function success(Transaction $transaction)
    {
        dd($transaction->id);
        // Pastikan anggota ada
        $proses = $transaction->anggota;

        if (!$proses) {
            // Jika anggota tidak ditemukan, berikan pesan error atau lakukan penanganan lain
            session()->flash('error', 'Anggota terkait tidak ditemukan.');
            return redirect()->route('bendahara');
        }

        // Verifikasi status transaksi dari Midtrans
        $status = request('transaction_status');

        if ($status == 'capture' || $status == 'settlement') {
            $transaction->status = 'success';  // Update status jadi 'success'

            // Periksa apakah nominal cukup
            if ($proses->saldo_hutang >= $transaction->price) {
                // Kurangi saldo_hutang dan tambahkan saldo_bayar
                $proses->saldo_hutang -= $transaction->price;
                $proses->saldo_bayar += $transaction->price;

                // Simpan perubahan pada pro$proses
                $proses->save();
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

        return view('livewire.bendahara.pembayaran-kas', [
            'proses' => $this->proses,
            'snapToken' => $this->snapToken,
            'transaction' => $this->transaction,
        ]);
    }
}
