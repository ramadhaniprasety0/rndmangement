<?php

namespace App\Livewire\Birokrasi;

use App\Models\Surat;
use App\Models\surat_keluar;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads; // Menambahkan trait untuk upload file
use Illuminate\Support\Facades\Storage;

class SuratKeluarCreate extends Component
{
    use WithFileUploads; // Mengaktifkan fitur upload file di Livewire

    #[Title('Surat Keluar R&D')]

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

    #[Validate('required|file|mimes:pdf|max:10240', message: 'File harus berupa PDF dan maksimal 10MB.')]
    public $file;


    public function render()
    {
        $surats = Surat::all();
        return view('livewire.birokrasi.surat-keluar-create', compact('surats'));
    }

    public function keluar()
    {
        // Validasi bahwa file diupload dan jenis surat dipilih
        // $this->validate([
        //     'surats_id' => 'required',
        //     'file' => 'required|file|mimes:pdf,doc,docx|max:10240', // Validasi file yang diizinkan
        // ]);
        $this->validate();

        // Menyimpan file
        $filePath = $this->file->store('surat_keluar_files', 'public');

        // Menyimpan data surat keluar
        surat_keluar::create([
            'no_srt' => $this->no_srt,
            'lamp_srt' => $this->lamp_srt,
            'trtj_srt' => $this->trtj_srt,
            'surats_id' => $this->surats_id,
            'created_at' => $this->created_at,
            'file_path' => $filePath, // Menyimpan path file yang diupload
        ]);

        return $this->redirect('/sekretaris', navigate: true);
    }
}
