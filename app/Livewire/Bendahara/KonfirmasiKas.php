<?php

namespace App\Livewire\Bendahara;

use App\Models\Transaction;
use Livewire\Component;

class KonfirmasiKas extends Component
{

    public $transaction;
    public function mount($transactionId)
    {
        $this->transaction = Transaction::with('user')->find($transactionId);
        if (!$this->transaction) {
            abort(404, 'Transaction not found');
        }
    }

    public function render()
    {
        return view('livewire.bendahara.konfirmasi-kas', [
            'transaction' => $this->transaction,
            'snapToken' => $this->transaction->snap_token,
        ]);
    }
}
