<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ComentarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/videos', function () {
    return view('indexx');
 });
   
Route::prefix('v1')->group(function () {

Route::get('/video/{d}',[VideoController::class,'showVideo']);
Route::delete('/video/{d}',[VideoController::class,'Delete']);
Route::put('/video/{d}', [VideoController::class,'Update']);
Route::get('/video',[VideoController::class,'List']);
Route::post('/videos', [VideoController::class, 'Store']);
Route::get('/videos/{d}',[VideoController::class, 'List']);

});


Route::prefix('v2')->group(function () {
    Route::post('/comentario', [ComentarioController::class, 'CreateComentario']);
    Route::get('/comentario/{d}',[ComentarioController::class,'FindComentario']);
    Route::delete('/comentario/{d}',[ComentarioController::class,'DeleteComentario']);
    Route::put('/comentario/{d}', [ComentarioController::class,'UpdateComentario']);
    Route::get('/comentario',[ComentarioController::class,'ListComentarios']);
    Route::get('/comentario/{d}/video',[ComentarioController::class, 'MostrarComentariosDeUnVideo']);
    Route::get('/comentario/{d}/user',[ComentarioController::class, 'BuscarComentariosDeUnUsuario']);
    Route::get('/comentario/{d}/restore',[ComentarioController::class, 'RestoreComentario']); 
    
    });

//Route::post('/videos', [VideoController::class, 'Store']);


//Route::post('/videos', [VideoController::class, 'Store']);