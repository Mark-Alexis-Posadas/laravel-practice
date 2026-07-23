<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInformationController;


Route::resource(
    '/',
    PersonalInformationController::class
);

Route::get(
    '/personal-information-export',
    [PersonalInformationController::class, 'export']
)->name('personal-information.export');

Route::post(
    '/personal-information-import',
    [PersonalInformationController::class, 'import']
)->name('personal-information.import');

Route::post(
    '/personal-information/{id}/restore',
    [PersonalInformationController::class, 'restore']
)->name('personal-information.restore');

Route::delete(
    '/personal-information/{id}/force-delete',
    [PersonalInformationController::class, 'forceDelete']
)->name('personal-information.force-delete');
