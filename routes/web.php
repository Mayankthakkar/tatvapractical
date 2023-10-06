<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Route::any('event', [EventController::class, 'index'])->name('event');
Route::any('event-add', [EventController::class, 'create'])->name('event.create');
Route::any('event-store', [EventController::class, 'store'])->name('event.store');
Route::any('event-edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::any('event-update', [EventController::class, 'update'])->name('event.update');
Route::any('event-delete/{id}', [EventController::class, 'destroy'])->name('event.delete');
Route::any('event-view/{id}', [EventController::class, 'view'])->name('event.view');