<?php

namespace App\Livewire\Bendahara;

use App\Models\Transaction;
use Livewire\Attributes\Title;
use Livewire\Component;

class RiwayatPembayaranKas extends Component
{
    #[Title('Bendahara R&D')]
    public function render()
    {
        $datas = Transaction::all();
        $anggotas = Transaction::with('user')->get();

        return view('livewire.bendahara.riwayat-pembayaran-kas', [
            'anggotas' => $anggotas,
            'datas' => $datas
        ]);
    }
    
}
