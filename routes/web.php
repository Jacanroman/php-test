<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ApiController::class,'index']);
Route::get('/detail/{id}', [ApiController::class, 'show']);

//We can add here a route to redirect in case we have an error

Route::any('{any}', [ApiController::class, 'redirect'])->where('any', '.*');
