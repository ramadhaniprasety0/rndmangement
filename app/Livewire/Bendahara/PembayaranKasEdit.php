<?php

namespace App\Livewire\Bendahara;

use App\Models\Anggota;
use Livewire\Attributes\Title;
use Livewire\Component;

class PembayaranKasEdit extends Component
{
    #[Title('Edit Pembayaran Kas R&D')]

    public $pembayarankas;

    public $user_nama;

    public $no_tlpn;

    public $total_tagihan;

    public $saldo_bayar;

    public $saldo_hutang;



    public function mount($id)
    {
        $this->pembayarankas = Anggota::find($id);


        // Pastikan anggota ditemukan
        if ($this->pembayarankas) {
            // Ambil nama pengguna melalui relasi 'user'
            $this->user_nama = $this->pembayarankas->user ? $this->pembayarankas->user->name : 'Nama Tidak Ditemukan';
            $this->no_tlpn = $this->pembayarankas->no_tlpn;
            $this->total_tagihan = $this->pembayarankas->total_tagihan;
            $this->saldo_bayar = $this->pembayarankas->saldo_bayar;
            $this->saldo_hutang = $this->pembayarankas->saldo_hutang;
        } else {
            // Tangani jika anggota tidak ditemukan
            $this->user_nama = 'Nama Tidak Ditemukan';
        }
    }


    public function updatePembayaranKas()
    {
        $this->pembayarankas->update([
            'no_tlpn' => $this->no_tlpn,
            'total_tagihan' => $this->total_tagihan,
            'saldo_bayar' => $this->saldo_bayar,
            'saldo_hutang' => $this->saldo_hutang,
        ]);

        return $this->redirect('/bendahara', navigate: true);
    }

    public function render()
    {

        return view('livewire.bendahara.pembayaran-kas-edit');
    }
}
