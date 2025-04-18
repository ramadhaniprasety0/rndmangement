<?php

namespace App\Livewire\Birokrasi;

use App\Models\Surat;
use App\Models\Template_surats;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class TemplateSuratsEdit extends Component
{
    use LivewireWithFileUploads;
    #[Title('Edit Surat Keluar R&D')]

    #[Validate('required', message: 'The jenis surat field is required.')]
    public $tipesurats_id;

    #[Validate('required|file|mimes:doc,docx|max:10240', message: 'File harus berupa Word (.doc/.docx) dan maksimal 10MB.')]
    public $file;

    public $template;

    public function render()
    {
        $surats = Surat::all();
        return view('livewire.birokrasi.template-surats-edit', compact('surats'));
    }

    public function mount($id)
    {
        $this->template = Template_surats::find($id);
        $this->tipesurats_id = $this->template->tipesurats_id;
        $this->file = $this->template->file_path;
        
    }
}
