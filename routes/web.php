<?php

use App\Http\Controllers\DriversSeasonController;
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

Route::get('/', [DriversSeasonController::class, 'index'])->name('home');
Route::get('/edit_drivers_season/{id}', [DriversSeasonController::class, 'edit'])->name('edit_drivers_season');
Route::get('/delete_drivers_season/{id}', [DriversSeasonController::class, 'destroy'])->name('delete_drivers_season');
Route::patch('/update/{id}', [DriversSeasonController::class, 'update'])->name('update');
Route::get('/create', [DriversSeasonController::class, 'create'])->name('create');
Route::post('/drivers_season', [DriversSeasonController::class, 'store'])->name('store');



