<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\PasswordResetController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Auth\VerfifyEmailController;

Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class);
Route::post('register', RegisterController::class);
Route::post('password/email', [PasswordResetController::class, 'SendResetLinkEmail']);
Route::post('password/reset', [PasswordResetController::class, 'reset'])->middleware('signed')->name('password.reset');

Route::post('email/verify/send', [VerfifyEmailController::class, 'sendEmail']);
Route::post('email/verfiy', [VerfifyEmailController::class, 'verify'])->middleware('signed')->name('verify.email');