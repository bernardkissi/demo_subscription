<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/site/{site:id}/post', [PostController::class, 'create'])->name('create.post');
Route::post('/site/{site:id}/subscribe', [SubscriptionController::class,'subscribe'])
    ->name('subscribe');
Route::get('/site/{site:id}/subscribers', [SiteController::class,'index'])
    ->name('get.subscribers');
