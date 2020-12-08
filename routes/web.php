<?php

use Illuminate\Support\Facades\{Route, Auth};
use App\Http\Controllers\MenuController;

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

Route::middleware('auth')->group(function () {

    Route::get('menu/export', [MenuController::class, 'export'])
        ->name('menu.export')
        ->middleware('can:menu.export');

    Route::get('menu/order/{menu}', [MenuController::class, 'order'])
        ->name('menu.order');

    Route::get('', [MenuController::class, 'index'])
        ->name('menu');

    Route::get('menu/create', [MenuController::class, 'create'])
        ->name('menu.create')
        ->middleware('can:menu.create');

    Route::post('menu', [MenuController::class, 'store'])
        ->name('menu.store')
        ->middleware('can:menu.create');

    Route::get('menu/show/{menu}', [MenuController::class, 'show'])
        ->name('menu.show');

    Route::get('menu/edit/{menu}', [MenuController::class, 'edit'])
        ->name('menu.edit')
        ->middleware('can:menu.edit');

    Route::put('menu/update/{menu}', [MenuController::class, 'update'])
        ->name('menu.update')
        ->middleware('can:menu.edit');

    Route::delete('menu/delete/{menu}', [MenuController::class, 'destroy'])
        ->name('menu.delete')
        ->middleware('can:menu.delete');
});

Auth::routes();
