<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoriesController;

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

// routes for api categories
Route::get("categories", [CategoriesController::class,"category_index"]);
Route::get("categories/show/{id}", [CategoriesController::class,"show_category"]);
Route::post("categories/posts", [CategoriesController::class,"create_category"]);
Route::put("categories/update", [CategoriesController::class,"category_update"]);
Route::delete("categories/delete/{id}", [CategoriesController::class,"category_delete"])->name('categories.category_delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
