<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::controller(\App\Http\Controllers\AuthController::class)->group(function (){
        Route::post('login', 'login');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
        Route::post('me', 'me');

    });

});

require __DIR__ . '/moderator/index.php';
