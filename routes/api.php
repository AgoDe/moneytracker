<?php

use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TransactionTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('accounts', [AccountController::class, 'index']);
    Route::get('transaction-types', [TransactionTypeController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories-with-subcategories', [CategoryController::class, 'getCategoriesWithSubcategories']);
});


