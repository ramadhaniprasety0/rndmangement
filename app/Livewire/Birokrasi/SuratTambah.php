<?php

namespace App\Livewire\Birokrasi;

use App\Models\Surat;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SuratTambah extends Component
{
    #[Title('Tambah Surat R&D')]

    #[Validate('required', message: 'The nama surat field is required.')]
    public $kt_surat;

    public function render()
    {
        return view('livewire.birokrasi.surat-tambah');
    }

    public function addsurat()
    {
        $this->validate();
        Surat::create($this->all());
        return $this->redirect('/sekretaris', navigate: true);
    }
}
