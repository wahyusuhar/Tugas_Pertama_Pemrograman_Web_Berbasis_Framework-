<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

// Rute resource untuk ChirpController, termasuk metode index, create, store, show, edit, update, dan destroy.
Route::resource('chirps', ChirpController::class);

// Mengarahkan rute root ke metode index pada ChirpController
Route::get('/', [ChirpController::class, 'index']);


