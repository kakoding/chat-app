<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OauthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/signup', [PagesController::class, 'signup']);
Route::post('/signup', [PagesController::class, 'storeSignup']);

Route::get('/', [PagesController::class, 'home']);
Route::get('/signin', [PagesController::class, 'signin']);
Route::post('/signin', [PagesController::class, 'sendSignin']);

Route::get('/signout', [PagesController::class, 'signout']);

// uji coba sementara nanti pakai controller baru
Route::get('/chats', [PagesController::class, 'chats']);