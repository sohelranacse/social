<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController};
use App\Http\Controllers\{PaymentHistory};


//User controllers group routing
Route::controller(UserController::class)->middleware('auth', 'user', 'verified', 'activity', 'prevent-back-history')->group(function () {
    Route::get('user/dashboard', 'dashboard')->name('user.dashboard');


    Route::get('user/ads', 'ads')->name('user.ads');
    Route::get('user/ad/create', 'ad_create')->name('user.ad.create');
    Route::post('user/ad/store', 'ad_store')->name('user.ad.store');
    Route::get('user/ad/edit/{id}', 'ad_edit')->name('user.ad.edit');
    Route::post('user/ad/update/{id}', 'ad_update')->name('user.ad.update');
    // Route::get('user/ad/status/{id}', 'ad_status')->name('user.ad.status');
    Route::get('user/ad/delete/{id}', 'ad_delete')->name('user.ad.delete');
    //Route::get('user/ad/activation/{id}', 'ad_activation')->name('user.ad.activation');user.ad.ad_charge_by_daterange
    Route::get('user/ad/ad_charge_by_daterange', 'ad_charge_by_daterange')->name('user.ad.ad_charge_by_daterange');
    Route::post('user/ad/payment_configuration/{id}', 'payment_configuration')->name('user.ad.payment_configuration');
    Route::get('user/ad/payment_success/{identifier}', 'payment_success')->name('user.ad.payment_success');

});

Route::controller(PaymentHistory::class)->middleware('auth', 'user', 'verified', 'activity', 'prevent-back-history')->group(function () {
    Route::get('user/payment-histories', 'index')->name('user.payment_histories');
});