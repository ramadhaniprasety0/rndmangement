<?php

namespace App\Livewire\Birokrasi;

use App\Models\Surat;
use App\Models\Template_surats;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class TemplateSuratsCreate extends Component
{
    use WithFileUploads;
    #[Title('Template Surat R&D')]

    #[Validate('required', message: 'The jenis surat field is required.')]
    public $tipesurats_id;

    #[Validate('required|file|mimes:doc,docx|max:10240', message: 'File harus berupa Word (.doc/.docx) dan maksimal 10MB.')]
    public $file;

    public function render()
    {
        $surats = Surat::all();
        return view('livewire.birokrasi.template-surats-create', compact('surats'));
    }

    public function addtemplate()
    {
        $this->validate();
        $filePath = $this->file->store('template_surat_files', 'public');

        Template_surats::create([
            'tipesurats_id' => $this->tipesurats_id,
            'file_path' => $filePath,
        ]);
        return $this->redirect('/sekretaris', navigate: true);
    }
}
