<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\RegisterController;

Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);
Route::post('register', RegisterController::class);