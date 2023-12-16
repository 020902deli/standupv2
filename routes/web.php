<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController; 
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ComediantController; 
use App\Http\Controllers\ContactController;  
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

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [EventController::class, 'index']);  

Route::resource('events', EventController::class); 

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
Route::get('/', function () {
    return redirect()->route('login'); // Redirecționează către pagina de login atunci când deschizi aplicația
});
Auth::routes();

    /*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [EventController::class, 'index']);
    
    Route::resource('events', EventController::class);// Ruta de resurse va genera CRUD URI
*/
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home'); 

    //EVENT//
    Route::get('/events', [EventController::class, 'index']);
    Route::resource('events', EventController::class);

    //COMEDIANT//
    Route::get('/comedians', [ComediantController::class, 'index']);
    Route::resource('comedians', ComediantController::class);

    //CONTACT//
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::resource('contacts', ContactController::class); 

});
