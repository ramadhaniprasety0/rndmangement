<div>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Pembayaran Research & Development</h1>
            <nav>
                <ol class="breadcrumb">
                    <li wire:nevigate class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li wire:nevigate class="breadcrumb-item"><a href="/bendahara">Bendahara</a></li>
                    <li class="breadcrumb-item active">Pembayaran Kas</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section d-flex justify-content-center align-items-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pembayaran Uang Kas Anggota</h5>

                            <p class="form-control">Nama Anggota: {{ $transaction->user ? $transaction->user->name : 'Nama Tidak Ditemukan' }}</p>

                            <p class="form-control">Total Tagihan: Rp {{ number_format($transaction->price, 0, ',', '.') }}</p>

                            <button id="pay-button" class="btn btn-outline-primary float-end">Bayar Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main><!-- End #main -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        document.getElementById('pay-button').onclick = function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    window.location.href = '/pay/success/{{ $transaction->id }}?transaction_status=' + result.transaction_status;
                },
                onPending: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                },
                onError: function(result) {
                    document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                }
            });
        };
    </script>
</div>