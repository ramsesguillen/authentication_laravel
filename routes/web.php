<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\GetApiController;
use App\Http\Controllers\GetApiTest;
use App\Http\Controllers\NotaController;
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

// link server: http://3.18.111.231/

Route::get('/get', [GetApiController::class, 'get'])->name('get.api');
Route::get('/get-one', [GetApiController::class, 'getOne'])->name('getOne.api');
Route::get('/post', [GetApiController::class, 'post'])->name('post.api');
Route::get('/put', [GetApiController::class, 'put'])->name('put.api');
Route::get('/delete', [GetApiController::class, 'delete'])->name('delete.api');


Route::get('/register/api', [GetApiTest::class, 'register'])->name('register.api');
Route::get('/get/api', [GetApiTest::class, 'get'])->name('get-test.api');
Route::get('/get-one/api', [GetApiTest::class, 'getOne'])->name('getOne-test.api');
// Route::get('/post/api', [GetApiTest::class, 'post'])->name('post-test.api');
Route::get('/put/api', [GetApiTest::class, 'put'])->name('put-test.api');
Route::get('/delete/api', [GetApiTest::class, 'delete'])->name('delete-test.api');
Route::get('/login/api', [GetApiTest::class, 'login'])->name('login.api');
Route::get('/logout/api', [GetApiTest::class, 'logout'])->name('logout.api');


Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', CategoriaController::class );
Route::resource('etiquetas', EtiquetaController::class );
Route::resource('notas', NotaController::class );


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
