<?php

namespace App\Livewire\Bendahara;

use Livewire\Component;
use App\Models\Anggota;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Midtrans\Snap;
use Midtrans\Config;


class Bendahara extends Component
{
    #[Title('Bendahara R&D')]
    
    public function render()
    {
        $totalkas = Anggota::sum('saldo_bayar');
        $anggotas = Anggota::with('user')->get();

        return view('livewire.bendahara.bendahara', [
            'anggotas' => $anggotas,
            'totalkas' => $totalkas,
        ]);
    }

    
}
