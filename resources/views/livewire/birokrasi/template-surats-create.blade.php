<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Birokrasi Research & Development</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li wire:nevigate class="breadcrumb-item"><a href="/sekretaris">Birokrasi</a></li>
                    <li class="breadcrumb-item active">Tambah Template Surat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Template Surat</h5>

                            <!-- General Form Elements -->
                            <form wire:submit.prevent='addtemplate' enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputFile" class="col-sm-2 col-form-label">Lampiran File</label>
                                    <div class="col-sm-10">
                                        <input wire:model="file" type="file" class="form-control" accept=".doc,.docx">
                                        @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Jenis Surat</label>
                                    <div class="col-sm-10">
                                        <div class="form-check grid gap-3">
                                            @foreach($surats as $surat)
                                            <div class="g-col-6">
                                                <input wire:model="tipesurats_id" class="form-check-input" type="radio" value="{{ $surat->id }}">
                                                <label class="form-check-label" for="gridRadios1">
                                                    {{ $surat->kt_surat }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('tipesurats_id') <span class="text-danger">{{ $message }}</span> @enderror
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