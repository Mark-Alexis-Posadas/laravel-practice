<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInformationController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource(
    'personal-information',
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
