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

Route::get('/admin/profil', function (){
    return view('admin.profil');
})->name('admin.profil');

// route untuk CRUD profil oleh admin
Route::prefix('admin')->group(function () {
    Route::get('/admin/profil/new', [ProfilController::class, 'getProfil'])->name('profil.get');
    Route::get('/admin/profil/show', [ProfilController::class, 'showProfil'])->name('profil.show');
    Route::post('/admin/profil', [ProfilController::class, 'store'])->name('profil.store');
    Route::post('/admin/profil/update', [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/admin/profil/delete', [ProfilController::class, 'destroy'])->name('profil.delete');
});


Route::get('/visi-misi', [VisiController::class, 'show'])->name('visi.show');
Route::post('/visi-misi', [VisiController::class, 'store'])->name('visi.store');
// Route::get('/visi-misi/latest', [VisiController::class, 'getLatest'])->name('visi.latest');
Route::put('/visi-misi/{id}/visi', [VisiController::class, 'updateVisi'])->name('visi.updateVisi');
Route::put('/visi-misi/{id}/misi', [VisiController::class, 'updateMisi'])->name('visi.updateMisi');
Route::delete('/visi-misi/{id}/visi', [VisiController::class, 'deleteVisi'])->name('visi.deleteVisi');
Route::delete('/visi-misi/{id}/misi', [VisiController::class, 'deleteMisi'])->name('visi.deleteMisi');

Route::get('/layanan', [LayananController::class, 'show'])->name('layanan.show');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
Route::put('/layanan/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/{id}', [LayananController::class, 'delete'])->name('layanan.delete');

// // group untuk admin
// Route::middleware(['auth', 'admin'])->group(function () {

// });

require __DIR__.'/auth.php';
