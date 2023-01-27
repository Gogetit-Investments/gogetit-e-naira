<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ConsumerController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
// Route::get('/register', 'RegisterController@show')->name('register.show');
// Route::post('/register', 'RegisterController@register')->name('register.perform');

// Route::get('/login', 'LoginController@show')->name('login.show');
// Route::post('/login', 'LoginController@login')->name('login.perform');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');


Route::get('file-import-export', [UserController::class, 'fileImportExport']);
Route::post('file-import', [ConsumerController::class, 'fileImport'])->name('file-import');