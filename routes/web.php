<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommendController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\Vente_ElementController;
use App\Http\Controllers\Commend_ElementController;


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


Route::get('/', [UserController::class, 'home'])->name('home');
Route::middleware('auth')->group(function () {


    Route::resource('categories', CategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('users', UserController::class);
    Route::resource('commends', CommendController::class);
    Route::resource('ventes', VenteController::class);
    Route::resource('ventes_elements', Vente_ElementController::class);
    Route::resource('commends_elements', Commend_ElementController::class);
    Route::resource('charges', ChargeController::class);

});

Auth::routes();

Route::get('/commends_elements/create/{id}', [App\Http\Controllers\Commend_ElementController::class, 'create'])->name('commend_user_create');



Route::get('/commend/user/create/{id}', [App\Http\Controllers\CommendController::class, 'add_new'])->name('commend_user_create');
Route::post('/commend/user/create', [App\Http\Controllers\CommendController::class, 'store_new'])->name('commend_user_create');
Route::get('user/commends/edit/{id}', [App\Http\Controllers\CommendController::class, 'edit_cmd']);
Route::put('edit/{id}', [App\Http\Controllers\CommendController::class, 'update_cmd']);
Route::DELETE('/user/commends/delete/{id}', [App\Http\Controllers\CommendController::class, 'delete']);

Route::DELETE('/delete/element/{id}', [App\Http\Controllers\Commend_ElementController::class, 'destroy']);
