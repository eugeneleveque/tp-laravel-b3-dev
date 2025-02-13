<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;

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

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{id}/show', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/box', [BoxController::class, 'index'])->name('box.index');
    Route::get('/box/{id}/show', [BoxController::class, 'show'])->name('box.show');
    Route::get('/box/create', [BoxController::class, 'create'])->name('box.create');
    Route::post('/box', [BoxController::class, 'store'])->name('box.store');
    Route::get('/box/{id}/edit', [BoxController::class, 'edit'])->name('box.edit');
    Route::put('/box/{id}', [BoxController::class, 'update'])->name('box.update');
    Route::delete('/box/{id}', [BoxController::class, 'destroy'])->name('box.destroy');

    Route::get('/tenant', [TenantController::class, 'index'])->name('tenant.index');
    Route::get('/tenant/{id}/show', [TenantController::class, 'show'])->name('tenant.show');    
    Route::get('/tenant/create', [TenantController::class, 'create'])->name('tenant.create');    
    Route::post('/tenant', [TenantController::class, 'store'])->name('tenant.store');    
    Route::get('/tenant/{id}/edit', [TenantController::class, 'edit'])->name('tenant.edit');    
    Route::put('/tenant/{id}', [TenantController::class, 'update'])->name('tenant.update');    
    Route::delete('/tenant/{id}', [TenantController::class, 'destroy'])->name('tenant.destroy');
});

require __DIR__.'/auth.php';
