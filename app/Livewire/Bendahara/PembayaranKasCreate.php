<?php

namespace App\Livewire\Bendahara;

use App\Models\Anggota;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PembayaranKasCreate extends Component
{
    #[Title('Tambah Pembayaran Kas R&D')]

    #[Validate('required', message: 'The nama  field is required.')]
    public $users_id;

    #[Validate('required', message: 'The nominal field is required.')]
    public $total_tagihan;

    #[Validate('required', message: 'The nominal field is required.')]
    public $saldo_bayar;

    #[Validate('required', message: 'The nominal field is required.')]
    public $saldo_hutang;

    #[Validate('required', message: 'The No Telepon field is required.')]
    public $no_tlpn;


    public function render()
    {
        $users = User::all();
        return view('livewire.bendahara.pembayaran-kas-create', compact('users'));
    }

    public function tambahPembayaranKas()
    {
        $this->validate();

        Anggota::create([
            'user_id' => $this->users_id,
            'total_tagihan' => $this->total_tagihan,
            'saldo_bayar' => $this->saldo_bayar,
            'saldo_hutang' => $this->saldo_hutang,
            'no_tlpn' => $this->no_tlpn
        ]);

        return $this->redirect('/bendahara', navigate: true);
    }
}
