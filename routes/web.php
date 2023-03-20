<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AaharCatering;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EventMenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IngredientTypeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(AaharCatering::class)->group(function(){
    Route::get('/','login')->name('logins');
    Route::get('/sign-up','signUp')->name('signUp');
    Route::get('/dashboard','dashboard')->name('dashboard');
}); 
Route::resource('category',CategoryController::class)->names('category')->middleware('auth');
Route::resource('item',ItemController::class)->names('item')->middleware('auth');
Route::resource('ingredient',IngredientController::class)->names('ingredient')->middleware('auth');
Route::resource('event',EventController::class)->names('event')->middleware('auth');
Route::resource('eventMenu',EventMenuController::class)->names('eventMenu')->middleware('auth');
Route::resource('order',OrderController::class)->names('order')->middleware('auth');
Route::resource('ingredient_type',IngredientTypeController::class)->names('ingredient_type')->middleware('auth');
Route::post('/addCorrelation',[App\Http\Controllers\OrderController::class,'addCorrelation'])->name('addCorrelation');
Route::post('/selectItem',[App\Http\Controllers\OrderController::class,'selectItem'])->name('selectItem');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
