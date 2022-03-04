<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestaurantController;

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



Route::get('users', [UserController::class, 'index']);
Route::post('users', [UserController::class, 'store']);
Route::get('users/{user}', [UserController::class, 'show']);
Route::put('users/{user}', [UserController::class, 'update']);
Route::delete('users/{user}', [UserController::class, 'destroy']);
// Routes log in
Route::post('login', [AuthController::class, 'login']);
Route::post('singup', [AuthController::class, 'singup']);

// routes restaurants
Route::get('restaurants', [RestaurantController::class, 'index']);
Route::post('restaurants', [RestaurantController::class, 'store']);
Route::get('restaurants/{restaurant}', [RestaurantController::class, 'show']);
Route::put('restaurants/{restaurant}', [RestaurantController::class, 'update']);
Route::delete('restaurants/{restaurant}', [RestaurantController::class, 'destroy']);

//routes meals
Route::get('meals', [MealController::class, 'index']);
Route::post('meals', [MealController::class, 'store']);
Route::get('meals/{meal}', [MealController::class, 'show']);
Route::put('meals/{meal}', [MealController::class, 'update']);
Route::delete('meals/{meal}', [MealController::class, 'destroy']);
