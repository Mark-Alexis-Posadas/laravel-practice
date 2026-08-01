<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonalInformationController;
use App\Http\Controllers\PageController;

// ===============================
// PAGE ROUTES
// ===============================
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/students', [PageController::class, 'students'])->name('students');
Route::get('/courses', [PageController::class, 'courses'])->name('courses');
Route::get('/subjects', [PageController::class, 'subjects'])->name('subjects');
Route::get('/instructors', [PageController::class, 'instructors'])->name('instructors');
Route::get('/enrollments', [PageController::class, 'enrollments'])->name('enrollments');
Route::get('/reports', [PageController::class, 'reports'])->name('reports');

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
Route::post(
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
