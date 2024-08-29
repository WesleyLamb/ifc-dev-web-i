<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use OpenApi\Attributes as OA;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'posts'], function() {
        Route::get('', [PostController::class, 'index']);
        Route::post('', [PostController::class, 'store']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('', [PostController::class, 'show']);
            Route::put('', [PostController::class, 'update']);
            // Route::delete('', 'PostController@destroy');
        });
    });
});
