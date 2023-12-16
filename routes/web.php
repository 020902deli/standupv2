<?php


use App\Http\Controllers\ContactController;
use App\Http\Controllers\ComediantController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\EventContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PartnerSponsorController;
use App\Http\Controllers\SpContactController; 
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

    //AGENDA//
    Route::get('/agendas', [AgendaController::class, 'index']);    
    Route::resource('agendas', AgendaController::class);

    //EVENTCONTACT//
    Route::get('/eventContacts', [EventContactController::class, 'index']);    
    Route::resource('eventContacts', EventContactController::class);

    //partnerSPONSOR//
    Route::get('/partnerSponsors', [PartnerSponsorController::class, 'index']);     
    Route::resource('partnerSponsors', PartnerSponsorController::class);

    //spCONTACT//
    Route::get('/', [SpContactController::class, 'index']);
    Route::resource('spContacts', SpContactController::class); 
});
