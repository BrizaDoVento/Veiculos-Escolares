<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return redirect()->route('vehicles.index');
});

Route::resource('vehicles', VehicleController::class);
