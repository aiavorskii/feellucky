<?php

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LinkHashMiddleware;
use App\Http\Middleware\LinkTokenMiddleware;
use App\Http\Middleware\TokenAccessMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('form');
});

Route::post('/user', [UserController::class, 'store']);

Route::post('/user/{user}/link-generate', [UserController::class, 'generateNewLink']);
Route::post('/user/{user}/get-history', [GameController::class, 'getHistory']);
Route::post('/user/{user}/feellucky', [GameController::class, 'feelLucky']);
Route::post('/user/{user}/deactivate-link', [UserController::class, 'deactivateActiveLink']);

Route::middleware([TokenAccessMiddleware::class])->group(function () {
    Route::get('/user/{user}', [UserController::class, 'view'])->name('user.view');
});

Route::middleware('auth')->group(function () {
});



Route::get('{token}', [AuthController::class, 'linkTokenLogin'])
    ->where(['token' => '[A-Za-z0-9]{8}'])
    ->name('auth.token.login')
    ->middleware(LinkTokenMiddleware::class);
