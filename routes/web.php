<?php

use App\Http\Controllers\ExcelController;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

Route::get('/hello', [HelloWorldController::class, "show"]);
Route::get('/users/list', [UserController::class, "index"])->middleware("auth");
Route::delete('/users/{user}', [UserController::class, "destroy"])->middleware("auth");

Auth::routes();

Route::get('/home', [ExcelController::class, 'index'])->name('import');
Route::post('/import', [ExcelController::class, 'importData']);
Route::get('/export', [ExcelController::class, 'exportData']);

Route::get('/search', [ExcelController::class, 'search'])->name('search');
Route::resource('/data', ExcelController::class);