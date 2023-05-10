<?php

use App\Http\Controllers\Site\ProductController;

use Illuminate\Support\Facades\Route;

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



Route::resource('products', ProductController::class);
Route::post('produtos/listar',[ProductController::class, 'listar']);
// Route::get('/', function () {
//     return 'Minha Primeira rota com Laravel';
// });

route::post('produtos/deletar',[ProductController::class, 'delete']);