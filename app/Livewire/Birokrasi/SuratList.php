<?php

namespace App\Livewire\Birokrasi;

use App\Models\Surat;
use App\Models\surat_keluar;
use App\Models\surat_masuk;
use App\Models\Template_surats;
use Livewire\Attributes\Title;
use Livewire\Component;

class SuratList extends Component
{
    #[Title('Birokrasi R&D KMUP')]
    public function render()
    {
        return view('livewire.birokrasi.surat-list', [
            'surats' => Surat::all(),
            'surat_masuks' => surat_masuk::all(),
            'surat_keluars' => surat_keluar::all(),
            'template_surats' => Template_surats::all()
        ]);
    }

    public function deleteSuratKeluar($id)
    {
        surat_keluar::find($id)->delete();
        return $this->redirect('/sekretaris', navigate: true);
    }

    public function deleteSurat($id)
    {
        Surat::find($id)->delete();
        return $this->redirect('/sekretaris', navigate: true);
    }

    public function deleteTemplateSurat($id)
    {
        Template_surats::find($id)->delete();
        return $this->redirect('/sekretaris', navigate: true);
    }
}
