<?php

use App\Http\Controllers\IotDeviceController;
use App\Http\Controllers\IotSensorController;
use App\Http\Controllers\PlantAidGuideController;
use App\Http\Controllers\PlantPackageController;
use App\Http\Controllers\PlantTaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user')->group( function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::prefix('plant-packages')->group(function () {
        Route::get('/', [PlantPackageController::class, 'index']);
        Route::get('/{id}', [PlantPackageController::class, 'show']);
        Route::post('/', [PlantPackageController::class, 'store']);
        Route::prefix('tasks')->group(function () {
            Route::get('/{id}', [PlantTaskController::class, 'show']);
            Route::post('/', [PlantTaskController::class, 'store']);
        });
    });

    Route::prefix('iot-devices')->group(function () {
        Route::get('/{id}', [IotDeviceController::class, 'show']);
        Route::get('/check/{id}', [IotDeviceController::class, 'check']);
        Route::post('/', [IotDeviceController::class, 'store']);
        Route::prefix('sensors')->group(function () {
            Route::get('/{id}', [IotSensorController::class, 'show']);
            Route::post('/', [IotSensorController::class, 'store']);
        });
    });

    Route::prefix('plant-aid-guides')->group(function () {
        Route::get('/', [PlantAidGuideController::class, 'index']);
        Route::post('/', [PlantAidGuideController::class, 'store']);
    });
});
