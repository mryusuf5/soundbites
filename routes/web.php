<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SoundsController;
use App\Http\Controllers\ThemesController;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', [SoundsController::class, 'index'])->name('home');

Route::get('nieuwe-categorie', [CategoriesController::class, 'create'])->name('addCategory');
Route::post('nieuwe-categorie', [CategoriesController::class, 'store']);
Route::post('categorieën/{categoryId}', [CategoriesController::class, 'show'])->name('singleCategory');
Route::get('nieuwe-geluiden', [SoundsController::class, 'create'])->name('addSound');
Route::post('nieuwe-geluiden', [SoundsController::class, 'store']);
Route::post('thema-veranderen', [ThemesController::class, 'change'])->name('changeTheme');
Route::get('verwijder-geluid', [SoundsController::class, 'destroy'])->name('deleteSound');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
