<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Bendahara Research & Development</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li wire:nevigate class="breadcrumb-item"><a href="/bendahara">Bendahara</a></li>
                    <li wire:nevigate class="breadcrumb-item">Tambah Pembayaran Kas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tambah Pembayaran Kas</h5>

                            <!-- General Form Elements -->
                            <form wire:submit.prevent='tambahPembayaranKas' enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Nama Anggota</label>
                                    <div class="col-sm-12">
                                        <select wire:model="users_id" class="form-select">
                                            <option value="">Pilih Nama Anggota</option>
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('users_id') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Total Tagihan</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input wire:model="total_tagihan" type="number" class="form-control">
                                    </div>
                                </div>
                                @error('total_tagihan') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="row mb-1">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Belum Dibayar</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input wire:model="saldo_hutang" type="number" class="form-control">
                                    </div>
                                </div>
                                @error('saldo_hutang') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="row mb-1">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">Sudah Dibayar</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Rp</span>
                                        <input wire:model="saldo_bayar" type="number" class="form-control">
                                    </div>
                                </div>
                                @error('saldo_bayar') <span class="text-danger">{{ $message }}</span> @enderror
                                <div class="row mb-3">
                                    <label for="inputNumber" class="col-sm-2 col-form-label">No Telepon</label>
                                    <div class="col-sm-12">
                                        <input wire:model="no_tlpn" type="number" class="form-control">
                                        @error('no_tlpn') <span class="text-danger">{{ $message }}</span> @enderror
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