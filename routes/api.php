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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => '/v1'],function()
{
    Route::get('/product-categories', [App\Http\Controllers\ProductCategoryController::class, 'index']);
    Route::get('/product-ingredients', [App\Http\Controllers\ProductIngredientController::class, 'index']);
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index']);
    Route::get('/popular-product', [App\Http\Controllers\ProductController::class, 'popularProduct']);
    Route::get('/stores', [App\Http\Controllers\StoreController::class, 'index']);

    Route::post('token', [App\Http\Controllers\AuthController::class, 'requestToken']);
    Route::post('register', [App\Http\Controllers\UserController::class, 'store']);
    Route::post('payment', [App\Http\Controllers\PaymentController::class, 'index']);
    Route::post('fcm-token', [App\Http\Controllers\FcmUserTokenController::class, 'store'])->name('save.token');

    Route::post('current-order', [App\Http\Controllers\OrderController::class, 'show']);

    Route::post('show-profile', [App\Http\Controllers\ProfileController::class, 'show']);
    Route::post('edit-profile', [App\Http\Controllers\ProfileController::class, 'edit']);


});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);
 
    return ['token' => $token->plainTextToken];
});
