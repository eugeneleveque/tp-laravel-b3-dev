<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BoxController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractTemplateController;
use App\Http\Controllers\BillController;


use Illuminate\Support\Facades\Route;

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

    Route::get('/contract_templates', [ContractTemplateController::class, 'index'])->name('contract_templates.index');
    Route::get('/contract_templates/{contractTemplate}/show', [ContractTemplateController::class, 'show'])->name('contract_templates.show');    
    Route::get('/contract_templates/create', [ContractTemplateController::class, 'create'])->name('contract_templates.create');    
    Route::post('/contract_templates', [ContractTemplateController::class, 'store'])->name('contract_templates.store');    
    Route::get('/contract_templates/{contractTemplate}/edit', [ContractTemplateController::class, 'edit'])->name('contract_templates.edit');    
    Route::put('/contract_templates/{contractTemplate}', [ContractTemplateController::class, 'update'])->name('contract_templates.update');    
    Route::delete('/contract_templates/{contractTemplate}', [ContractTemplateController::class, 'destroy'])->name('contract_templates.destroy');


    Route::get('/contract', [ContractController::class, 'index'])->name('contract.index');
    Route::get('/contract/{id}/show', [ContractController::class, 'show'])->name('contract.show');    
    Route::get('/contract/create', [ContractController::class, 'create'])->name('contract.create');    
    Route::post('/contract', [ContractController::class, 'store'])->name('contract.store');    
    Route::get('/contract/{id}/edit', [ContractController::class, 'edit'])->name('contract.edit');    
    Route::put('/contract/{id}', [ContractController::class, 'update'])->name('contract.update');    
    Route::delete('/contract/{id}', [ContractController::class, 'destroy'])->name('contract.destroy');
    // Route::get('contract/{id}/generate-pdf', [ContractController::class, 'generatePdf'])->name('contract.generate_pdf');

    Route::get('bill', [BillController::class, 'index'])->name('bill.index');  // Afficher toutes les factures
    Route::get('/bill/{id}/show', [BillController::class, 'show'])->name('bill.show');
    Route::get('/bill/create', [BillController::class, 'create'])->name('bill.create');
    Route::post('/bill', [BillController::class, 'store'])->name('bill.store');  // Générer des factures
    Route::get('bill/{id}/edit', [BillController::class, 'edit'])->name('bill.edit');
    Route::put('bill/{id}', [BillController::class, 'update'])->name('bill.update');
    



});

require __DIR__.'/auth.php';
