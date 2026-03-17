<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/profil', [PublicController::class, 'profile'])->name('profile');
Route::get('/struktur', [PublicController::class, 'structure'])->name('structure');
Route::get('/berita', [PublicController::class, 'news'])->name('news');
Route::get('/berita/{slug}', [PublicController::class, 'newsDetail'])->name('news.detail');
Route::get('/galeri', [PublicController::class, 'gallery'])->name('gallery');
Route::view('/kontak', 'welcome')->name('contact'); // Placeholder

Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/account', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/account', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Routes
    Route::resource('admin/posts', \App\Http\Controllers\Admin\PostController::class)->names('admin.posts');

    Route::get('admin/profile-organization', [\App\Http\Controllers\Admin\OrganizationProfileController::class, 'edit'])->name('admin.organization-profile.edit');
    Route::put('admin/profile-organization', [\App\Http\Controllers\Admin\OrganizationProfileController::class, 'update'])->name('admin.organization-profile.update');

    Route::resource('admin/members', \App\Http\Controllers\Admin\MemberController::class)->names('admin.members');

    Route::resource('admin/galleries', \App\Http\Controllers\Admin\GalleryController::class)
        ->only(['index', 'store', 'destroy'])
        ->names('admin.galleries');
});


use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Test email', function ($message) {
        $message->to('hidayatalfin928@gmail.com')
            ->subject('Test');
    });

    return 'Email terkirim';
});

require __DIR__ . '/auth.php';
