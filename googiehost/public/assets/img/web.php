<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReferController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SmmowlController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Home\FrontController;
use App\Http\Middleware\UserLogin;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::prefix('/')->controller(FrontController::class)->group(function () {
    Route::get('/', 'Index')->name('index');
    Route::get('/login',  'Login')->name('login');
    Route::post('process-login',  'processLogin')->name('process.login');
    Route::get('/register', 'registration')->name('register');
    Route::get('/register/{refer?}', 'registration')->name('register.referral');
    Route::post('register-process', 'registrationProcess')->name('registration.process');
    Route::get('/verify/{email}', 'verificationProcess')->name('verification.process');
    Route::get('/forgot-password', 'ForgotPassword')->name('forgot.password');
    Route::post('/forgot-password-process', "ForgotPasswordProcess")->name("forgot.Password.Process");
    Route::post('/verify-otp', "VerifyOtp")->name("verify.otp");
    Route::post('/reset-password', "ResetPassword")->name("reset.password");
    Route::post('/process-referral', 'ReferralProcess')->name('referral.process');
});



Route::middleware([UserLogin::class])->group(function () {

    Route::prefix('/')->controller(AdminController::class)->group(function () {
        Route::get('/dashboard', 'Dashboard')->name('dashboard');
        Route::get('mail',  'MailConfiguration')->name('mail.configuration');
        Route::post('mail',  'MailConfigSetup')->name('mail.configuration.setup');
    });

    Route::prefix('/')->controller(SmmowlController::class)->group(function () {
        Route::get('manage-funds',  'ManageFunds')->name('manage.funds');
        Route::post('/razorpay/payment/store', 'store')->name('razorpay.payment.store');
        Route::get('/payment-success', 'PaymentSuccess')->name('payment.success');
        Route::get('mass-order',  'MassOrder')->name('mass.order');
        Route::get('logout', 'logout')->name('user.logout');
        Route::get('/account-setting', 'AccountSetting')->name('account.setting');
    });
    Route::prefix('/profile')->controller(AccountController::class)->group(function () {
        Route::post('/upload', 'upload')->name('profile.upload');
        Route::delete('/delete', 'delete')->name('profile.delete');
        Route::post('/update', 'update')->name('profile.update');
        Route::post('/reset-password', 'ResetPassword')->name('reset.password');
    });
    Route::prefix('/order')->controller(OrderController::class)->group(function () {
        Route::get('/',  'ManageOrder')->name('manage.order');
        Route::post('/process', 'placeorder')->name('place.new.order');
        Route::get('orders',  'Order')->name('orders');
        Route::post('update-status', 'UpdateOrderStatus')->name('update.order.status');
        Route::get('/delete/{id}', 'deleteOrder')->name('delete.order');
    });
    Route::prefix('/ticket')->controller(TicketController::class)->group(function () {
        Route::get('/',  'ManageTickets')->name('manage.tickets');
        Route::get('/manage-tickets', 'AddTickets')->name('add.tickets');
        Route::post('/process-user-tickets', 'ProcessTickets')->name('process.user.tickets');
        Route::post('update-status', 'UpdateTicketStatus')->name('update.ticket.status');
        Route::get('/manage-chat', 'ManageChat')->name('manage.chat');
        Route::post('/ticket-reply/{reply}', 'TicketReply')->name('ticket.reply');
    });

    Route::prefix('/services')->controller(ServiceController::class)->group(function () {
        Route::get('/',  'Services')->name('services');
    });

    Route::prefix('/referrals')->controller(ReferController::class)->group(function () {
        Route::get('/',  'Referrals')->name('referrals');
        Route::post('/send-refer-url', 'SendReferUrl')->name('send.refer.url');
    });
});
