<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::post('/clienteCadastro', UserController::class.'@create')->name("user.create");
Route::group(['prefix' => 'cliente'], function () {
    Route::put('/{id}', UserController::class.'@update')->name("user.update");
    Route::delete('/{id}', UserController::class.'@delete')->name("user.delete");
    Route::get('/{id}', UserController::class.'@show')->name("user.show");
});
Route::get('/consulta/final-placa/{number}', UserController::class.'@searchByPlate')->name("user.searchByPlate");
