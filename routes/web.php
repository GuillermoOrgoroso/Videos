<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
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



//Route::get('/videos', function () {
  //return view('indexx');
//});

//Route::post('/videos', [VideoController::class, 'Store']);

Route::get('/vervideo', function () {
  return view('verVideo');
});

