<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DedicatedPlansController;
use App\Http\Controllers\Admin\DedicatedServerOfferController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\paidHostingOfferController;
use App\Http\Controllers\Admin\PaidPlansController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\VpsHostingOfferController;
use App\Http\Controllers\Admin\VpsPlansController;
use App\Http\Controllers\Front\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/freehosting', [HomeController::class, 'freehosting'])->name('freehosting');
Route::get('/web-hosting-sale-coupons', [HomeController::class, 'webHostingSaleCoupons'])->name('web.hosting.sale.coupons');
Route::get('/cheap-vps-hosting', [HomeController::class, 'cheapVpsHosting'])->name('cheap.vps.hosting');
Route::get('/cheap-dedicated-server', [HomeController::class, 'cheapDedicatedServer'])->name('cheap.dedicated.server');

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
    Route::get('/hero-status/{id?}/{status}', [HeroController::class, 'status'])->name('hero.status');
    Route::delete('/delete-hero-section/{id?}', [HeroController::class, 'delHeroSection'])->name('hero.delete');

    // manage service section 
    Route::get('/services-section', [ServicesController::class, 'index'])->name('admin.services-section');
    Route::get('/manage-services-section/{id?}', [ServicesController::class, 'upsert'])->name('manage.services-section');
    Route::post('/services-store/{id?}', [ServicesController::class, 'upsertProcess'])->name('services.store');
    Route::get('/services-status/{id?}//{status}', [ServicesController::class, 'status'])->name('services.status');
    Route::delete('/delete-services-section/{id?}', [ServicesController::class, 'delServiceSection'])->name('services.delete');

    // manage faq section
    Route::get('/faq-section', [FaqController::class, 'index'])->name('admin.faq-section');
    Route::get('/manage-faq-section/{id?}', [FaqController::class, 'upsert'])->name('manage.faq-section');
    Route::post('/faq-store/{id?}', [FaqController::class, 'upsertProcess'])->name('faq.store');
    Route::get('/faq-status/{id}/{status}', [FaqController::class, 'status'])->name('faq.status');
    Route::delete('/delete-faq-section/{id?}', [FaqController::class, 'delFaqSection'])->name('faq.delete');

    // manage paid plans
    Route::get('/paid-hosing-plans', [PaidPlansController::class, 'index'])->name('admin.paid-hosting-plans');
    Route::get('/manage-paid-hosting-plans/{id?}', [PaidPlansController::class, 'upsert'])->name('manage.paid-hosting-plans');
    Route::post('/paid-hosting-plans-store/{id?}', [PaidPlansController::class, 'upsertProcess'])->name('paid-hosting-plans.store');
    Route::get('/paid-hosting-plans-status/{id?}/{status}', [PaidPlansController::class, 'status'])->name('paid.status');
    Route::delete('/delete-paid-hosting-plans/{id?}', [PaidPlansController::class, 'delPaidPlans'])->name('paid.delete');


    // manage vps plans
    Route::get('/vps-hosing-plans', [VpsPlansController::class, 'index'])->name('admin.vps-hosting-plans');
    Route::get('/manage-vps-hosting-plans/{id?}', [VpsPlansController::class, 'upsert'])->name('manage.vps-hosting-plans');
    Route::post('/vps-hosting-plans-store/{id?}', [VpsPlansController::class, 'upsertProcess'])->name('vps-hosting-plans.store');
    Route::get('/vps-hosting-plans-status/{id?}/{status}', [VpsPlansController::class, 'status'])->name('vps.status');
    Route::delete('/delete-vps-hosting-plans/{id?}', [VpsPlansController::class, 'delVPSPlans'])->name('vps.delete');

    // manage dedicated plans
    Route::get('/dedicated-hosing-plans', [DedicatedPlansController::class, 'index'])->name('admin.dedicated-hosting-plans');
    Route::get('/manage-dedicated-hosting-plans/{id?}', [DedicatedPlansController::class, 'upsert'])->name('manage.dedicated-hosting-plans');
    Route::post('/dedicated-hosting-plans-store/{id?}', [DedicatedPlansController::class, 'upsertProcess'])->name('dedicated-hosting-plans.store');
    Route::get('/dedicated-hosting-plans-status/{id?}/{status}', [DedicatedPlansController::class, 'status'])->name('dedicated.status');
    Route::delete('/delete-dedicated-hosting-plans/{id?}', [DedicatedPlansController::class, 'delDediPlans'])->name('dedicated.delete');

    // manage paid offer section 
    Route::get('/offer/paid', [PaidHostingOfferController::class, 'index'])->name('offer.paid');
    Route::get('/offer/paid/manage/', [PaidHostingOfferController::class, 'upsert'])->name('offer.paid.manage');
    Route::post('/offer/paid/store/', [PaidHostingOfferController::class, 'store'])->name('offer.paid.store');
    Route::get('/offer/paid/status/{id?}/{status}', [PaidHostingOfferController::class, 'status'])->name('offer.paid.status');
    Route::delete('/offer/paid/delete/{id?}', [PaidHostingOfferController::class, 'delDediPlans'])->name('offer.paid.delete');

    // manage VPS offer section
    Route::get('/offer/vps', [VpsHostingOfferController::class, 'index'])->name('offer.vps');
    Route::get('/offer/vps/manage/', [VpsHostingOfferController::class, 'upsert'])->name('offer.vps.manage');
    Route::post('/offer/vps/store/', [VpsHostingOfferController::class, 'store'])->name('offer.vps.store');
    Route::get('/offer/vps/status/{id?}/{status}', [VpsHostingOfferController::class, 'status'])->name('offer.vps.status');
    Route::delete('/offer/vps/delete/{id?}', [VpsHostingOfferController::class, 'delete'])->name('offer.vps.delete');
    // manage Dedicated server offer section
    Route::get('/offer/dedicated', [DedicatedServerOfferController::class, 'index'])->name('offer.dedicated');
    Route::get('/offer/dedicated/manage/', [DedicatedServerOfferController::class, 'upsert'])->name('offer.dedicated.manage');
    Route::post('/offer/dedicated/store/', [DedicatedServerOfferController::class, 'store'])->name('offer.dedicated.store');
    Route::get('/offer/dedicated/status/{id?}/{status}', [DedicatedServerOfferController::class, 'status'])->name('offer.dedicated.status');
    Route::delete('/offer/dedicated/delete/{id?}', [DedicatedServerOfferController::class, 'delete'])->name('offer.dedicated.delete');
});
