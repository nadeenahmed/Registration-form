<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ActorsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('persons', PersonController::class);
Route::get('/check-username/{username}', [PersonController::class, 'checkUsername']);
Route::get('/actors/born-on-date', [ActorsController::class, 'getActorsBornOnDate']);
Route::get('/{lang}', function ($lang) {
    App::setlocale($lang);
    return view('welcome');
});

//Route::post('/store', [App\Http\Controllers\MyController::class, 'store']);




