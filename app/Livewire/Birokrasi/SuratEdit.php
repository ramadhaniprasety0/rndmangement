<?php

namespace App\Livewire\Birokrasi;

use App\Models\Surat;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class SuratEdit extends Component
{
    #[Title('Tambah Surat R&D')]

    #[Validate('required', message: 'The nama surat field is required.')]
    public $kt_surat;

    public $editsurat;

    public function mount($id)
    {
        $this->editsurat = Surat::find($id);
        // dd($editsurat);
        $this->kt_surat = $this->editsurat->kt_surat;
    }

    public function render()
    {
        return view('livewire.birokrasi.surat-edit');
    }

    public function suratUpdate()
    {
        $this->validate();

        $data = [
            'kt_surat' => $this->kt_surat
        ];

        $this -> editsurat->update($data);
        return $this->redirect('/sekretaris', navigate: true);
    }
}
