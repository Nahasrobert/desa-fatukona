<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ApbdesaController;
use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BantuanJenisController;
use App\Http\Controllers\KKController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\BantuanPenerimaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BpdController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LapakController;
use App\Http\Controllers\LinmasController;
use App\Http\Controllers\PembangunanController;
use App\Http\Controllers\PemerintahDesaController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PkkController;
use App\Http\Controllers\ProdukHukumController;
use App\Http\Controllers\SuratTemplateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SettingController;
// ---------- Auth ----------
// Route untuk login/logout
Route::get('/', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/berita/{slug}', [UserController::class, 'show'])->name('berita.show');
Route::get('peta', [UserController::class, 'peta'])->name('peta');
Route::get('produk-hukum', [UserController::class, 'produkHukum'])->name('produk-hukum');
Route::get('/informasi-publik', [UserController::class, 'informasiPublik'])->name('informasi.publik');
Route::get('/berita', [UserController::class, 'berita'])->name('berita');
Route::get('/galeri', [UserController::class, 'galeri'])->name('galeri');
Route::get('/pembangunan', [UserController::class, 'pembangunan'])->name('pembangunan');
Route::get('/bantuan', [UserController::class, 'bantuan'])->name('bantuan');
Route::get('/sejarah', [UserController::class, 'sejarah'])->name('sejarah');
Route::get('/visimisi', [UserController::class, 'visimisi'])->name('visimisi');
Route::get('/struktur', [UserController::class, 'struktur'])->name('struktur');
Route::get('/lapak', [UserController::class, 'lapak'])->name('lapak');
Route::get('/statistik', [UserController::class, 'statistik']);
Route::get('/apbd', [UserController::class, 'apbd'])->name('apbd');
Route::get('/pemerintah-desa/{kategori}', [UserController::class, 'aparatur'])->name('pemerintah-desa');






Route::get('/bantuan', [UserController::class, 'bantuan'])->name('bantuan');
Route::get('/realisasi', [UserController::class, 'realisasi'])->name('realisasi');
Route::get('/pengaduan', [UserController::class, 'pengaduan'])->name('pengaduan');
Route::post('/pengaduan/store', [UserController::class, 'storePengaduan'])->name('pengaduan.store');












Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

// ---------- Admin Area (wajib login & aktif) ----------
// Ganti prefix dari 'administrator' menjadi 'admin'
Route::prefix('admin')->name('admin.')->middleware(['auth', 'active'])->group(function () {

    // Dashboard untuk admin
    Route::get('/', [ControllerAdmin::class, 'index'])->name('dashboard');

    // CRUD untuk APBDesa
    Route::resource('apbdesa', ApbdesaController::class);
    Route::resource('kk', KKController::class);
    Route::resource('penduduk', PendudukController::class);
    Route::resource('bantuan_penerima', BantuanPenerimaController::class);
    Route::resource('berita', BeritaController::class);
    Route::get('/berita/{slug}', [BeritaController::class, 'showBySlug'])->name('berita.slug');
    Route::resource('bpd', BpdController::class);
    Route::resource('inventaris', InventarisController::class);
    Route::resource('informasi_publik', InformasiPublikController::class);
    Route::resource('lapak', LapakController::class);
    Route::resource('linmas', LinmasController::class);
    Route::resource('pembangunan', PembangunanController::class);
    Route::resource('pemerintahdesa', PemerintahDesaController::class);
    Route::resource('pengaduan', PengaduanController::class);
    Route::resource('pkk', PkkController::class);
    Route::resource('produk_hukum', ProdukHukumController::class);
    Route::resource('surat_template', SuratTemplateController::class);
    Route::post('/notifications/mark-read/{id}', [NotificationController::class, 'markAsRead'])
        ->middleware('auth')
        ->name('notifications.markRead');
    Route::resource('surat_keluar', SuratKeluarController::class);
    Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');




    Route::put('bantuan_penerima/{id}/verifikasi', [BantuanPenerimaController::class, 'verifikasi'])->name('bantuan_penerima.verifikasi');

    Route::resource('galeri', GaleriController::class);
    // CRUD untuk Bantuan Jenis
    Route::resource('bantuan', BantuanJenisController::class);

    // Aksi kelola (create/edit/delete) hanya admin & superadmin
    Route::middleware('role:admin,superadmin')->group(function () {
        Route::resource('berita', BeritaController::class);
        Route::resource('apbdesa', ApbdesaController::class);
        Route::resource('bantuan', BantuanJenisController::class);
        Route::resource('kk', KKController::class);
        Route::resource('penduduk', PendudukController::class);
        Route::resource('bantuan_penerima', BantuanPenerimaController::class);
        Route::get('/berita/{slug}', [BeritaController::class, 'showBySlug'])->name('berita.slug');
        Route::resource('bpd', BpdController::class);
        Route::resource('galeri', GaleriController::class);
        Route::resource('inventaris', InventarisController::class);
        Route::resource('lapak', LapakController::class);
        Route::resource('informasi_publik', InformasiPublikController::class);
        Route::resource('linmas', LinmasController::class);
        Route::resource('pembangunan', PembangunanController::class);
        Route::resource('pemerintahdesa', PemerintahDesaController::class);
        Route::resource('pengaduan', PengaduanController::class);
        Route::resource('pkk', PkkController::class);
        Route::resource('produk_hukum', ProdukHukumController::class);
        Route::resource('surat_template', SuratTemplateController::class);
        Route::post('/notifications/mark-read/{id}', [NotificationController::class, 'markAsRead'])
            ->middleware('auth')
            ->name('notifications.markRead');
        Route::resource('surat_keluar', SuratKeluarController::class);
        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::post('settings', [SettingController::class, 'update'])->name('settings.update');





        Route::put('bantuan_penerima/{id}/verifikasi', [BantuanPenerimaController::class, 'verifikasi'])->name('bantuan_penerima.verifikasi');
    });
});
