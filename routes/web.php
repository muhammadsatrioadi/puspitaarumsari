<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
});

Route::get('/profil', [PageController::class, 'profile'])->name('profil');

// Public News Routes
Route::get('/berita', [App\Http\Controllers\NewsPublicController::class, 'index'])->name('news.index');
Route::get('/berita/{news}', [App\Http\Controllers\NewsPublicController::class, 'show'])->name('news.show');

// Public Gallery Routes
Route::get('/galeri', [App\Http\Controllers\GalleryPublicController::class, 'index'])->name('gallery.index');

// Contact Routes
Route::get('/kontak', [ContactController::class, 'index'])->name('contact.index');
Route::post('/kontak', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::resource('admin/news', Admin\NewsController::class)->names('admin.news');
    Route::resource('admin/gallery', Admin\GalleryController::class)->names('admin.gallery');
});

require __DIR__.'/auth.php';
