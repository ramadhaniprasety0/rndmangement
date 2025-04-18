<?php

use App\Http\Controllers\PaymentController;
use App\Http\Livewire\KategoriSurat;
use App\Http\Livewire\Bendahara\Payment;
use App\Http\Livewire\Payment as LivewirePayment;
use App\Livewire\Bendahara\AnggotaBayar;
use App\Livewire\Bendahara\Bendahara;
use App\Livewire\Bendahara\KonfirmasiKas;
use App\Livewire\Bendahara\Pembayaran;
use App\Livewire\Bendahara\PembayaranKas;
use App\Livewire\Bendahara\PembayaranKasCreate;
use App\Livewire\Bendahara\PembayaranKasEdit;
use App\Livewire\Bendahara\RiwayatPembayaranKas;
use App\Livewire\Birokrasi\SuraKeluarEdit;
use App\Livewire\Birokrasi\SuratEdit;
use App\Livewire\Birokrasi\SuratKeluarCreate;
use App\Livewire\Birokrasi\SuratList;
use App\Livewire\Birokrasi\SuratTambah;
use App\Livewire\Birokrasi\TemplateSuratsCreate;
use App\Livewire\Birokrasi\TemplateSuratsEdit;
use App\Livewire\Dashboard;
use App\Models\surat_keluar;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', Dashboard::class);

Route::get('/sekretaris', SuratList::class);

Route::get('/surat/keluar', SuratKeluarCreate::class);

Route::get('/surat/keluar/{id}/edit', SuraKeluarEdit::class);

Route::get('/surat/tambah', SuratTambah::class);

Route::get('/surat/{id}/edit', SuratEdit::class);

Route::get('/download/surat-keluar/{filename}', function ($filename) {
    $path = storage_path('app/public/surat_keluar_files/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $customName = 'Surat-Keluar-' . now()->format('Ymd_His') . '.' . pathinfo($filename, PATHINFO_EXTENSION);

    return response()->download($path, $customName);
})->name('surat-keluar.download');

Route::get('/download/template_surat/{filename}', function ($filename) {
    $path = storage_path('app/public/template_surat_files/' . $filename);

    if (!file_exists($path)) {
        abort(404);
    }

    $customName = 'template_surat-' . now()->format('Ymd_His') . '.' . pathinfo($filename, PATHINFO_EXTENSION);

    return response()->download($path, $customName);
})->name('template_surat.download');

Route::get('/template/surat/tambah', TemplateSuratsCreate::class);

Route::get('/template/surat/{id}/edit', TemplateSuratsEdit::class);

Route::get('/bendahara', Bendahara::class)->name('bendahara');

// Payment
Route::get('/pay/{anggotaId}', Pembayaran::class)->name('pay');
Route::get('/pay/success/{transaction}', [Pembayaran::class, 'success'])->name('pay.success');

Route::get('/bendahara/pembayaran-kas/{id}/edit', PembayaranKasEdit::class);
Route::get('/bendahara/kas/{id}/bayar', PembayaranKas::class);

Route::get('/bendahara/bayar-sekarang/{transactionId}', KonfirmasiKas::class)->name('bendahara.bayar-sekarang');
Route::get('/bendahara/tambah-pembayaran', PembayaranKasCreate::class);
Route::get('/bendahara/riwayat-pembayaran-kas', RiwayatPembayaranKas::class);
