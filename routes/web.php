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