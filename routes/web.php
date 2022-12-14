<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ServiceController;
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

//RUTA PRINCIPAL
Route::get('/', [IndexController::class,'index']); 

Route::resource('site',SiteController::class);

Route::resource('service',ServiceController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
