<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');


// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // manage pages details 
    Route::get('/pages', [AdminController::class, 'addPages'])->name('admin.pages');
    Route::get('/manage-page/{id?}', [AdminController::class, 'managePage'])->name('manage.pages');
    Route::post('/page-store/{id?}', [AdminController::class, 'manageStore'])->name('pages.store');
    Route::post('/page-status/{id?}', [AdminController::class, 'manageStatus'])->name('pages.status');
    Route::delete('/page-delete/{id?}', [AdminController::class, 'manageDelete'])->name('pages.delete');

    // manage hero section 
    Route::get('/hero-section', [HeroController::class, 'index'])->name('admin.hero-section');
    Route::get('/manage-hero-section/{id?}', [HeroController::class, 'upsert'])->name('manage.hero-section');
    Route::post('/hero-store/{id?}', [HeroController::class, 'upsertProcess'])->name('hero.store');
    Route::post('/hero-status/{id?}', [HeroController::class, 'status'])->name('hero.status');
    Route::delete('/delete-hero-section/{id?}', [HeroController::class, 'delHeroSection'])->name('hero.delete');

    // manage service section 
    Route::get('/services-section', [ServicesController::class, 'index'])->name('admin.services-section');
    Route::get('/manage-services-section/{id?}', [ServicesController::class, 'upsert'])->name('manage.services-section');
    Route::post('/services-store/{id?}', [ServicesController::class, 'upsertProcess'])->name('services.store');
    Route::post('/services-status/{id?}', [ServicesController::class, 'status'])->name('services.status');
    Route::delete('/delete-services-section/{id?}', [ServicesController::class, 'delServiceSection'])->name('services.delete');

    // manage faq section
    Route::get('/faq-section', [FaqController::class, 'index'])->name('admin.faq-section');
    Route::get('/manage-faq-section/{id?}', [FaqController::class, 'upsert'])->name('manage.faq-section');
    Route::post('/faq-store/{id?}', [FaqController::class, 'upsertProcess'])->name('faq.store');
    Route::get('/faq-status/{id}/{status}', [FaqController::class, 'status'])->name('faq.status');
    Route::delete('/delete-faq-section/{id?}', [FaqController::class, 'delFaqSection'])->name('faq.delete');
});
