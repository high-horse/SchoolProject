<?php

use App\Http\Controllers\ApiHelperController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('api/link-class',[ApiHelperController::class,'linkClass'])->name('api.linkClass');