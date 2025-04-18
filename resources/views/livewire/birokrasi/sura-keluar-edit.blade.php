<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Birokrasi Research & Development</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item">Birokrasi</li>
                    <li class="breadcrumb-item active">Edit Surat Keluar</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Surat Keluar</h5>

                            <!-- General Form Elements -->
                            <form wire:submit.prevent='keluarUpdate' enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">No Surat</label>
                                    <div class="col-sm-10">
                                        <input wire:model="no_srt" type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Lampiran Surat</label>
                                    <div class="col-sm-10">
                                        <input wire:model="lamp_srt" type="text" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Tertuju Surat</label>
                                    <div class="col-sm-10">
                                        <input wire:model="trtj_srt" type="text" class="form-control">

                                    </div>
                                </div>

                                <!-- Input File untuk Upload -->
                                <div class="row mb-3">
                                    <label for="inputFile" class="col-sm-2 col-form-label">Lampiran File</label>
                                    <div class="col-sm-10">
                                        <input wire:model="file" type="file" class="form-control" accept=".pdf,.doc,.docx">
                                        @if ($old_file_path)
                                        <div class="mt-2">
                                            <a href="{{ Storage::url($old_file_path) }}" target="_blank" class="btn btn-outline-secondary btn-sm">
                                                <i class="bi bi-file-earmark-pdf-fill" style="color: red;"></i> Lihat File Lama
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-10">
                                        <div class="form-check grid gap-3">
                                            @foreach($surats as $surat)
                                            <div class="g-col-6">
                                                <input wire:model="surats_id" class="form-check-input" type="radio" value="{{ $surat->id }}">
                                                <label class="form-check-label" for="gridRadios1">
                                                    {{ $surat->kt_surat }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input wire:model="created_at" type="datetime-local" class="form-control">
                                        @error('created_at') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-outline-primary float-end">Kirim</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->
</div>