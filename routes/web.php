<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInformationController;

// ===============================
// MAIN CRUD (index, create, store, show, edit, update, destroy)
// ===============================
Route::middleware('throttle:60,1')->group(function () {

    Route::resource(
        '/',
        PersonalInformationController::class
    );
});

// ===============================
// EXPORT (5 per minute)
// ===============================
Route::get(
    '/personal-information-export',
    [PersonalInformationController::class, 'export']
)->middleware('throttle:5,1')
    ->name('personal-information.export');

// ===============================
// IMPORT (3 per minute)
// ===============================
Route::post(
    '/personal-information-import',
    [PersonalInformationController::class, 'import']
)->middleware('throttle:3,1')
    ->name('personal-information.import');

// ===============================
// RESTORE (10 per minute)
// ===============================
Route::post(
    '/personal-information/{id}/restore',
    [PersonalInformationController::class, 'restore']
)->middleware('throttle:10,1')
    ->name('personal-information.restore');

// ===============================
// FORCE DELETE (5 per minute)
// ===============================
Route::delete(
    '/personal-information/{id}/force-delete',
    [PersonalInformationController::class, 'forceDelete']
)->middleware('throttle:5,1')
    ->name('personal-information.force-delete');
