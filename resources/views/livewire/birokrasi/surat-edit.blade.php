<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Birokrasi Research & Development</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li wire:nevigate class="breadcrumb-item"><a href="/sekretaris">Birokrasi</a></li>
                    <li class="breadcrumb-item active">Tambah Jenis Surat</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Jenis Surat</h5>

                            <!-- General Form Elements -->
                            <form wire:submit.prevent='suratUpdate' enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nama Surat </label>
                                    <div class="col-sm-10">
                                        <input wire:model="kt_surat" type="text" class="form-control">
                                        @error('kt_surat') <div class="text-danger">{{ $message }}</div> @enderror
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