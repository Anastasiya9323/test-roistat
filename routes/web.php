<?php
namespace App\Http\Controllers;

// use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RequestController::class, 'index'])->name('request.index');
Route::post('/send-request', [RequestController::class, 'sendRequest'])->name('request.send_request');
