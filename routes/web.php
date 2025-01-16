<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;

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


// // group untuk admin
// Route::middleware(['auth', 'admin'])->group(function () {

// });

require __DIR__.'/auth.php';
