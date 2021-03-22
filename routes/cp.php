<?php

declare(strict_types=1);

use Codedge\GoogleMerchant\Http\Controllers\Cp\SettingsController;
use Illuminate\Support\Facades\Route;

Route::prefix('google-merchant/')->name('gm.')->group(function () {
    // Settings
    Route::get('/', [SettingsController::class, 'index'])->name('index');
    Route::patch('/update', [SettingsController::class, 'update'])->name('update');
});
