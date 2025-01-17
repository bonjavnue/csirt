<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\VisiController;
use App\Http\Controllers\LayananController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route untuk CRUD profil oleh admin
Route::prefix('admin/profil')->group(function () {
    Route::get('/new', [ProfilController::class, 'getProfil'])->name('profil.get');
    Route::get('', [ProfilController::class, 'showProfil'])->name('profil.show');
    Route::post('/store', [ProfilController::class, 'store'])->name('profil.store');
    Route::post('/update', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/delete', [ProfilController::class, 'destroy'])->name('profil.delete');
});

// route untuk CRUD visi misi oleh admin
Route::prefix('admin/visi-misi')->group(function () {
    Route::get('', [VisiController::class, 'show'])->name('visi.show');
    Route::post('/store', [VisiController::class, 'store'])->name('visi.store');
    Route::put('/{id}/visi/update', [VisiController::class, 'updateVisi'])->name('visi.updateVisi');
    Route::put('/{id}/misi/update', [VisiController::class, 'updateMisi'])->name('visi.updateMisi');
    Route::delete('/{id}/visi/delete', [VisiController::class, 'deleteVisi'])->name('visi.deleteVisi');
    Route::delete('/{id}/misi/delete', [VisiController::class, 'deleteMisi'])->name('visi.deleteMisi');
});

// route untuk CRUD layanan oleh admin
Route::prefix('admin/layanan')->group(function () {
    Route::get('', [LayananController::class, 'show'])->name('layanan.show');
    Route::post('/store', [LayananController::class, 'store'])->name('layanan.store');
    Route::put('/{id}/update', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('/{id}/delete', [LayananController::class, 'delete'])->name('layanan.delete');
});

Route::get('/admin/kontak', function () {
    return view('admin.kontak');
})->name('kontak.show');




Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {  
    return view('about');  
});

Route::get('/services', function () {  
    return view('layanan');  
});

Route::get('/info', function () {  
    return view('informasi');  
});

Route::get('/report', function () {  
    return view('aduan');  
});

Route::get('/news', function () {  
    return view('detail-berita');  
});

// // group untuk admin
// Route::middleware(['auth', 'admin'])->group(function () {

// });

require __DIR__.'/auth.php';
