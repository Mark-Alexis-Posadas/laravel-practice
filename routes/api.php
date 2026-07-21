<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInformationController;

Route::apiResource('personal-information', PersonalInformationController::class);