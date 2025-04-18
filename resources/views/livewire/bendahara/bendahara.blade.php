<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard Bendahara</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a wire:navigate href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Bendahara</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard" style="min-height: 100vh;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <!-- Pengeluaran Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card expense-card">

                                <div class="filter">
                                    <a class="icon" href="#" style="font-size: 30px;"><i class="bi bi-plus"></i></a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Pengeluaran <span>| Hari Ini</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cash-coin"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>145</h6>
                                            <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Pengeluaran Card -->

                        <!-- Pendapatan Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="filter">
                                    <a class="icon" href="#" style="font-size: 30px;"><i class="bi bi-plus"></i></a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Pendapatan <span>| Hari Ini</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cash"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>Rp. 1.200.000</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Pendapatan Card -->


                        <!-- Uang Kas -->
                        <div class="col-xxl-3 col-md-6">

                            <div class="card info-card mail-in-card">

                                <div class="filter">
                                    <a class="icon" href="#" style="font-size: 20px;"><i class="bi bi-eye"></i></a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Uang Kas Masuk <span>| Hari Ini</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-wallet2"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>Rp {{ number_format($totalkas, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Uang Kas Masuk -->

                        <!-- Uang kas Keluar -->
                        <div class="col-xxl-3 col-md-6">

                            <div class="card info-card mail-out-card">

                                <div class="filter">
                                    <a class="icon" href="#" style="font-size: 20px;"><i class="bi bi-plus"></i></a>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Uang Kas Keluar <span>| Hari Ini</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="color: #ff771d; background-color: #ffecdf">
                                            <i class="bi bi-cash-stack"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>0</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Surat Keluar -->

                    </div>
                </div>
                <!-- information -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Uang Kas Anggota</h5>
                                    </div>
                                    <div class="col-6">
                                        <a wire:navigate href="/bendahara/tambah-pembayaran" class="bi bi-person-fill-add float-end text-outline-primary" style="font-size: 30px;"></a>
                                    </div>
                                </div>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">No Telepon</th>
                                            <th scope="col">Tagihan</th>
                                            <th scope="col">Hutang</th>
                                            <th scope="col">Bayar</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($anggotas as $num => $anggota)
                                        <tr>
                                            <td>{{ $num + 1 }}</td>
                                            <td>{{ $anggota->user ? $anggota->user->name : 'Nama Tidak Ditemukan' }}</td>
                                            <td>{{$anggota->no_tlpn}}</td>
                                            @if($anggota->total_tagihan == $anggota->saldo_bayar)
                                            <td><span class="badge bg-success"><i class="bi bi-check-circle me-1"></i><del>Rp {{ number_format($anggota->total_tagihan, 0, ',', '.') }}</del></span></td>
                                            @else
                                            <td><span class="badge bg-primary"><i class="bi bi-exclamation-triangle me-1"></i></i>Rp {{ number_format($anggota->total_tagihan, 0, ',', '.') }}</span></td>
                                            @endif
                                            <td><span class="badge bg-danger">Rp {{ number_format($anggota->saldo_hutang, 0, ',', '.') }}</span></td>
                                            <td><span class="badge bg-info">Rp {{ number_format($anggota->saldo_bayar, 0, ',', '.') }}</span></td>
                                            <td>
                                                @if($anggota->total_tagihan == $anggota->saldo_bayar)
                                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Lunas</span> <!-- Badge hijau jika lunas -->
                                                @else
                                                <span class="badge bg-warning"><i class="bi bi-exclamation-octagon me-1"></i>Belum Lunas</span> <!-- Badge kuning jika belum lunas -->
                                                @endif
                                            </td>
                                            

                                            <td>{{$anggota->created_at}}</td>
                                            <td>
                                                <a wire:navigate href="/bendahara/pembayaran-kas/{{$anggota->id}}/edit" class="bi bi-pencil-square text-primary"></a>
                                                @if($anggota->saldo_bayar != $anggota->total_tagihan)
                                                <a href="/bendahara/kas/{{$anggota->id}}/bayar" class="bi bi-cash text-success"></a>
                                                @else
                                                <a href="" class="bi bi-ban text-warning"></a>
                                                @endif
                                                <a href="" class="bi bi-trash text-danger"></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>