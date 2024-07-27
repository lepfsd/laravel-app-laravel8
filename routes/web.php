<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortFolioController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

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
    //echo "<a href='" . route('contactos') . "'>contactos 1</a><br>";
});


// Example of middleware usage
Route::get('/home_resp', [HomeController::class, 'home']);

Route::get('saludo/{nombre?}', function($nombre = 'invitado'){
    return 'saludos ' . $nombre;
});

Route::get('contactame', function() {
    return 'seccion de contactos';
})->name('contactos');

Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::resource('portfolio', PortFolioController::class)
    ->parameters(['portfolio' => 'project']);

Route::resource('users', UsersController::class)
->parameters(['users' => 'users']);

Route::post('/contact', [MessagesController::class, 'store'])->name('contact');
Route::get('/messages', [MessagesController::class, 'index'])->name('messages.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
