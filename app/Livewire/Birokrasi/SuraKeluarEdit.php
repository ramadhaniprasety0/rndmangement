<?php

namespace App\Livewire\Birokrasi;

use App\Models\Surat;
use App\Models\surat_keluar;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class SuraKeluarEdit extends Component
{
    use LivewireWithFileUploads;
    #[Title('Edit Surat Keluar R&D')]

    #[Validate('required|min:3')]
    public $no_srt;

    #[Validate('required', message: 'The lampiran field is required.')]
    public $lamp_srt;

    #[Validate('required', message: 'The tertuju field is required.')]
    public $trtj_srt;

    #[Validate('required', message: 'The jenis surat field is required.')]
    public $surats_id;

    #[Validate('required', message: 'The tanggal field is required.')]
    public $created_at;

    #[Validate('nullable|file|mimes:pdf,doc,docx|max:10240')]
    public $file;

    public $suratkeluar;

    public $old_file_path;

    public function mount($id)
    {
        $this->suratkeluar = surat_keluar::find($id);
        // dd($suratkeluar);
        $this->no_srt = $this->suratkeluar->no_srt;
        $this->lamp_srt = $this->suratkeluar->lamp_srt;
        $this->trtj_srt = $this->suratkeluar->trtj_srt;
        $this->surats_id = $this->suratkeluar->surats_id;
        $this->created_at = $this->suratkeluar->created_at->format('Y-m-d\TH:i');
        $this->old_file_path = $this->suratkeluar->file_path;

    }

    public function render()
    {
        $surats = Surat::all();
        return view('livewire.birokrasi.sura-keluar-edit', compact('surats'));
    }

    // public function keluarUpdate(){
    //     $this->validate();
    //     $filePath = $this->file->store('surat_keluar_files', 'public'); 
    //     $this->suratkeluar->update($this->all());
    //     return $this->redirect('/sekretaris', navigate:true);
    // }
    public function keluarUpdate()
    {
        $this->validate();

        $data = [
            'no_srt'     => $this->no_srt,
            'lamp_srt'   => $this->lamp_srt,
            'trtj_srt'   => $this->trtj_srt,
            'surats_id'  => $this->surats_id,
            'created_at' => $this->created_at,
        ];

        if ($this->file) {
            $data['file_path'] = $this->file->store('surat_keluar_files', 'public');
        }

        $this->suratkeluar->update($data);

        session()->flash('success', 'Surat berhasil diperbarui.');
        return $this->redirect('/sekretaris', navigate: true);
    }
}
