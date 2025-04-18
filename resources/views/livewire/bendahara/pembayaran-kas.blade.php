<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pembayaran Research & Development</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li wire:nevigate class="breadcrumb-item"><a href="/bendahara">Bendahara</a></li>
                    <li class="breadcrumb-item active">Pembayaran Kas Anggota</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section" style="min-height: 100vh;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pembayaran Uang Kas</h5>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Anggota</label>
                                <div class="col-sm-12">
                                    <p wire:model="user_nama" class="form-control">{{$proses->user->name}}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Total Tagihan</label>
                                <div class="col-sm-12">
                                    <p wire:model="total_tagihan" class="form-control">Rp {{ number_format($proses->total_tagihan) }}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Total Sudah Dibayar</label>
                                <div class="col-sm-12">
                                    <p wire:model="saldo_bayar" class="form-control">Rp {{ number_format($proses->saldo_bayar) }}</p>
                                </div>
                            </div>
                            <form wire:submit.prevent='bayarSekarang' enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-2 col-form-label">Nominal Pembayaran</label>
                                    <div class="col-sm-12">
                                        <select wire:model="nominal_bayar" class="form-select">
                                            <option value="">Pilih Nominal Pembayaran</option>
                                            <option value="5000">Rp 5.000</option>
                                            <option value="10000">Rp 10.000</option>
                                            <option value="15000">Rp 15.000</option>
                                            <option value="20000">Rp 20.000</option>
                                            <option value="30000">Rp 30.000</option>
                                            <option value="40000">Rp 40.000</option>
                                            <option value="50000">Rp 50.000</option>
                                            <option value="{{ $proses->total_tagihan - $proses->saldo_bayar }}">Bayar Lunas (Rp {{ number_format($proses->total_tagihan - $proses->saldo_bayar) }})</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-primary float-end">Lanjut</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
</div>