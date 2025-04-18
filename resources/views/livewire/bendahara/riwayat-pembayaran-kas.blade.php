<div>
    <main class="main" id="main">
        <div class="pagetitle">
            <h1>Riwayat Pembayaran Kas</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li wire:nevigate class="breadcrumb-item"><a href="/bendahara">Bendahara</a></li>
                    <li wire:nevigate class="breadcrumb-item">Riwayat Pembayaran Kas</li>
                </ol>
            </nav>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Pembayaran Kas</h5>

                            <!-- Table with stripped rows -->
                            <div class="overflow-x-auto">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nominal</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Waktu</th>
                                            <th scope="col">Aksi</th>
                                    </thead>
                                    <tbody>
                                        @foreach($datas as $num => $data)
                                        <tr>
                                            <td>{{ $num + 1 }}</td>
                                            <td>{{$data->user ? $data->user->name : 'Nama Tidak Ditemukan' }}</td>
                                            <td>Rp {{number_format($data->price, 0, ',', '.')}}</td>
                                            <td>
                                                @if($data->status == 'Pending')
                                                <span class="badge bg-warning">{{$data->status}}</span> <!-- Badge kuning jika belum lunas -->
                                                @elseif($data->status == 'Success')
                                                <span class="badge bg-success">{{$data->status}}</span> <!-- Badge hijau jika lunas -->
                                                @endif
                                            </td>
                                            <td>{{$data->created_at}}</td>
                                            <td>
                                                <a href="#" class="bi bi-pencil-square text-primary"></a>
                                                <a href="#" class="bi bi-trash text-danger"></a>
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
    </main>
</div>