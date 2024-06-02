<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ApiController::class,'index']);
Route::get('/detail/{id}', [ApiController::class, 'show']);

//this route is in case have a different name be redirect to /
Route::any('{any}', [ApiController::class, 'redirect'])->where('any', '.*');
