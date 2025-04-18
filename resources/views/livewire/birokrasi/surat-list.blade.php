<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Birokrasi Research & Development</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Birokrasi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Surat Masuk</h5>
                            <div class="overflow-x-auto">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Lampiran</th>
                                            <th scope="col">Tertuju</th>
                                            <th scope="col">Tipe Surat</th>
                                            <th scope="col">Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($surat_masuks as $surat_masuk)
                                        <tr>
                                            <td>{{$surat_masuk->id}}</td>
                                            <td>{{$surat_masuk->no_srt}}</td>
                                            <td>{{$surat_masuk->lamp_srt}}</td>
                                            <td>{{$surat_masuk->trtj_srt}}</td>
                                            <td>{{$surat_masuk->surat->kt_surat}}</td>
                                            <td>{{$surat_masuk->created_at}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Surat Keluar</h5>
                                    </div>
                                    <div class="col-6">
                                        <a wire:navigate href="/surat/keluar" class="bi bi-file-earmark-plus-fill float-end text-outline-primary" style="font-size: 30px;"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">No Surat</th>
                                            <th scope="col">Tertuju</th>
                                            <th scope="col">Tipe Surat</th>
                                            <th scope="col">File</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($surat_keluars as $index => $surat_keluar)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $surat_keluar->no_srt }}</td>
                                            <td>{{ $surat_keluar->trtj_srt }}</td>
                                            <td>{{ $surat_keluar->surat->kt_surat }}</td>
                                            <td class="d-flex justify-content-center align-items-center">
                                                @if($surat_keluar->file_path)
                                                <a href="#" onclick="previewFile('{{ Storage::url($surat_keluar->file_path) }}')" class="text-danger">
                                                    <i class="bi bi-file-earmark-pdf-fill" style="font-size: 24px;"></i>
                                                </a>
                                                <a href="{{ route('surat-keluar.download', basename($surat_keluar->file_path)) }}" class="ms-2 text-primary">
                                                    <i class="bi bi-file-earmark-arrow-down-fill" style="font-size: 22px;"></i>
                                                </a>

                                                @else
                                                Tidak ada file
                                                @endif
                                            </td>

                                            <td>{{ $surat_keluar->created_at }}</td>
                                            <td>
                                                <a wire:navigate href="/surat/keluar/{{$surat_keluar->id}}/edit" class="bi bi-pencil-square text-warning"></a>
                                                <a
                                                    wire:click="deleteSuratKeluar({{ $surat_keluar->id }})"
                                                    wire:confirm="Apakah Anda yakin ingin menghapus surat keluar ini?"
                                                    href="#" class="bi bi-trash text-danger">
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Preview File -->
                <div class="modal fade" id="filePreviewModal" tabindex="-1" aria-labelledby="filePreviewModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Pratinjau File</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <iframe id="filePreviewFrame" src="" width="100%" height="600px" frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Jenis Surat</h5>
                                    </div>
                                    <div class="col-6">
                                        <a wire:navigate href="/surat/tambah" class="bi bi-file-plus-fill float-end text-outline-primary" style="font-size: 28px;"></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tipe Surat</th>
                                        <th scope="col">Updated Time</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($surats as $index => $surat)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{$surat->kt_surat}}</td>
                                        <td>{{$surat->updated_at}}</td>
                                        <td>
                                            <a wire:navigate href="/surat/{{$surat->id}}/edit" class="bi bi-pencil-square text-warning"></a>
                                            <a wire:click="deleteSurat({{ $surat->id }})"
                                                wire:confirm="Apakah Anda yakin ingin menghapus jenis surat ini?"
                                                href="#" class="bi bi-trash text-danger">
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Template Surat</h5>
                                    </div>
                                    <div class="col-6">
                                        <a wire:navigate href="/template/surat/tambah" class="bi bi-file-earmark-plus-fill float-end text-outline-primary" style="font-size: 28px;"></a>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Tipe Surat</th>
                                        <th scope="col">File</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($template_surats as $index => $template)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{$template->surat->kt_surat}}</td>
                                        <td>
                                            @if($template->file_path)
                                            <a href="{{ route('template_surat.download', basename($template->file_path)) }}" class="ms-2 text-primary">
                                                <i class="bi bi-file-earmark-word-fill" style="font-size: 17px;"></i>
                                            </a>

                                            @else
                                            Tidak ada file
                                            @endif
                                        </td>
                                        <td>
                                            <a wire:navigate href="/template/surat/{{$template->id}}/edit" class="bi bi-pencil-square text-warning"></a>
                                            <a wire:click="deleteTemplateSurat({{ $template->id }})"
                                                wire:confirm="Apakah Anda yakin ingin menghapus template surat ini?"
                                                href="#" class="bi bi-trash text-danger">
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
</div>
<script>
    function previewFile(fileUrl) {
        const modal = new bootstrap.Modal(document.getElementById('filePreviewModal'));
        document.getElementById('filePreviewFrame').src = fileUrl;
        modal.show();
    }
</script>