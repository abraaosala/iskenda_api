<?php

use App\Http\Controllers\Api\Admin\ClientController;
use App\Http\Controllers\Api\Admin\CompanyInfoController;
use App\Http\Controllers\Api\Admin\CompanyValueController;
use App\Http\Controllers\Api\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Api\Admin\CourseController;
use App\Http\Controllers\Api\Admin\DashboardController;
use App\Http\Controllers\Api\Admin\GalleryItemController;
use App\Http\Controllers\Api\Admin\ServiceController;
use App\Http\Controllers\Api\Admin\TeamMemberController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\SiteDataController;
use Illuminate\Support\Facades\Route;

Route::get('/site-data', SiteDataController::class);
Route::post('/contacts', [ContactController::class, 'store']);

Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/me', [AuthController::class, 'me']);

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', DashboardController::class);
        Route::apiResource('services', ServiceController::class);
        Route::apiResource('clients', ClientController::class);
        Route::apiResource('team-members', TeamMemberController::class);
        Route::apiResource('gallery-items', GalleryItemController::class);
        Route::apiResource('courses', CourseController::class);
        Route::apiResource('company-values', CompanyValueController::class);
        Route::apiResource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);
        Route::get('company-info', [CompanyInfoController::class, 'show']);
        Route::put('company-info', [CompanyInfoController::class, 'update']);
    });
});
