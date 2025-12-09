<?php

// Controller Admin
use App\Http\Controllers\Admin\AllKategoriController;
use App\Http\Controllers\Admin\PsbController as AdminPsbController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\DonasiController as AdminDonasiController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\DownloadController as AdminDownloadController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

// Controller Client
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\BeritaController;
use App\Http\Controllers\Client\DonasiController;
use App\Http\Controllers\Client\GaleriController;
use App\Http\Controllers\Client\BerandaController;
use App\Http\Controllers\Client\PaymentController;
use App\Http\Controllers\Client\DownloadController;
use App\Http\Controllers\Client\PsbController;




// Admin routes dengan middleware auth + superadmin
Route::prefix('admin')->middleware(['auth', 'superadmin'])->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('layouts.dashboard');

    // CRUD Berita Admin
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [AdminBeritaController::class, 'index'])->name('index');
        Route::get('/create', [AdminBeritaController::class, 'create'])->name('create');
        Route::post('/', [AdminBeritaController::class, 'store'])->name('store');
        Route::get('/{id_berita}/edit', [AdminBeritaController::class, 'edit'])->name('edit');
        Route::put('/{id_berita}', [AdminBeritaController::class, 'update'])->name('update');
        Route::delete('/{id_berita}', [AdminBeritaController::class, 'destroy'])->name('destroy');
    });

      // CRUD Galeri Admin
    Route::prefix('galeri')->name('galeri.')->group(function () {
        Route::get('/', [AdminGaleriController::class, 'index'])->name('index');
        Route::get('/create', [AdminGaleriController::class, 'create'])->name('create');
        Route::post('/', [AdminGaleriController::class, 'store'])->name('store');
        Route::get('/{galeri}/edit', [AdminGaleriController::class, 'edit'])->name('edit');
        Route::put('/{galeri}', [AdminGaleriController::class, 'update'])->name('update');
        Route::delete('/{galeri}', [AdminGaleriController::class, 'destroy'])->name('destroy');
    });

    // Route Download
    Route::prefix('download')->name('download.')->group(function () {
        Route::get('/', [AdminDownloadController::class, 'index'])->name('index');
        Route::get('/create', [AdminDownloadController::class, 'create'])->name('create');
        Route::post('/', [AdminDownloadController::class, 'store'])->name('store');
        Route::get('/{download}/edit', [AdminDownloadController::class, 'edit'])->name('edit');
        Route::put('/{download}', [AdminDownloadController::class, 'update'])->name('update');
        Route::delete('/{download}', [AdminDownloadController::class, 'destroy'])->name('destroy');
    });

    // Route donasi
    Route::prefix('donasi')->name('donasi.')->group(function () {
        Route::get('/', [AdminDonasiController::class, 'index'])->name('index');
        Route::get('/create', [AdminDonasiController::class, 'create'])->name('create');
        Route::post('/', [AdminDonasiController::class, 'store'])->name('store');
        Route::get('/{donasi}/edit', [AdminDonasiController::class, 'edit'])->name('edit');
        Route::put('/{donasi}', [AdminDonasiController::class, 'update'])->name('update');
        Route::delete('/{donasi}', [AdminDonasiController::class, 'destroy'])->name('destroy');

        // Aksi tambahan
        Route::get('/{donasi}', [AdminDonasiController::class, 'show'])->name('show');
        Route::post('/{donasi}/close', [AdminDonasiController::class, 'close'])->name('close');
        Route::get('/{donasi}/extend', [AdminDonasiController::class, 'extend'])->name('extend');
        Route::get('/{donasi}/export', [AdminDonasiController::class, 'export'])->name('export');
        Route::post('/{donasi}/broadcast', [AdminDonasiController::class, 'broadcast'])->name('broadcast');
    });

    // Route PSB
    Route::prefix('psb')->name('psb.')->group(function () {
        Route::get('/', [AdminPsbController::class, 'index'])->name('index');
        Route::get('/{id}', [AdminPsbController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [AdminPsbController::class, 'edit'])->name('edit');
        Route::put('/{id}', [AdminPsbController::class, 'update'])->name('update');
        Route::delete('/{id}', [AdminPsbController::class, 'destroy'])->name('destroy');

        // Export PDF
        Route::get('/{id}/export', [AdminPsbController::class, 'exportPdf'])->name('export');
    });


    // Route Semua Kategori
    Route::prefix('kategori')->name('kategori.')->group(function () {
        Route::get('/', [AllKategoriController::class, 'index'])->name('index');
        Route::post('/', [AllKategoriController::class, 'store'])->name('store');
    });
});



// Route sisi client
Route::prefix('/')->group(function() {
    Route::get('/', [BerandaController::class, 'index']);

    // Route Profil
    Route::prefix('profil')->group(function() {
        Route::view('/', 'client.menu.profil.index')->name('client.menu.profil.index');
    });

    // Route Berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('client.menu.berita.index');
    Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('client.menu.berita.show');

    // Route Galeri
    Route::prefix('galeri')->name('client.menu.galeri.')->group(function () {
        Route::get('/', [GaleriController::class, 'index'])->name('index');
        Route::get('/{id}', [GaleriController::class, 'show'])->name('show');
    });

    // Route client download
    Route::get('/download', [DownloadController::class, 'index'])->name('client.download.index');
    Route::get('/download/{download}', [DownloadController::class, 'show'])->name('client.download.show');

    // Route Donasi
    Route::prefix('donasi')->name('client.donasi.')->group(function () {
        Route::get('/', [DonasiController::class, 'index'])->name('index');
        Route::get('/{donasi}', [DonasiController::class, 'show'])->name('show');
        Route::get('/{donasi}/donate', [DonasiController::class, 'donateForm'])->name('donateForm');
        Route::post('/{donasi}/donate', [DonasiController::class, 'storeDonation'])->name('storeDonation');

        // E-Wallet
        Route::post('/{donasi}/ewallet/{donatur}', [PaymentController::class, 'payWithEwallet'])->name('ewallet');

        // QRIS Payment
        Route::get('/{donasi}/payment/{donatur}', [PaymentController::class, 'index'])->name('payment');

        // Callback dari Xendit
        Route::post('/xendit/callback/qris', [PaymentController::class, 'callback']);
    });


    // Route PSB
    Route::prefix('psb')->group(function () {
        Route::view('/', 'client.menu.psb.index')->name('client.menu.psb.index');
        Route::view('/formulir', 'client.menu.psb.formulir')->name('client.menu.psb.formulir');
        Route::post('/formulir', [PsbController::class, 'store'])->name('client.psb.store');
        Route::get('/success/{id}', [PsbController::class, 'success'])->name('client.psb.success');
        Route::get('/export/{id}', [PsbController::class, 'exportPdf'])->name('client.psb.export');
    });

});


require __DIR__.'/auth.php';
