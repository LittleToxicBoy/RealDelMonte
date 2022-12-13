<?php

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'checarSession'])->name('home');

Route::get('/lugares', function () {
    return view('administrar.lugares');
})->middleware(['auth'])->name('lugares');

Route::get('/negocios', function () {
    return view('administrar.negocios');
})->middleware(['auth'])->name('negocios');

Route::get('/administrar', function () {
    return view('administrar.admPueblo');
})->middleware(['auth'])->name('adm');

Route::get('/negocios/administrar/{idNegocio}', function ($idNegocio) {
    return view('administrar.negocioAd', [
        'id_negocio' => $idNegocio,
    ]);
})->middleware(['auth'])->name('negociosAdministrar');

Route::get('/negocios/promociones/{negocio}', function ($negocio) {
    return view('administrar.promociones', [
        'negocio' => $negocio,
    ]);
})->middleware(['auth'])->name('negociosPromociones');

Route::get('/inicio', function () {
    return view('inicio.index');
})->name('inicio');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/insert', function () {
    $stuRef = app('firebase.firestore')->database()->collection('Students')->newDocument();
    $stuRef->set([
        'firstName' => 'Steven',
        'lastName' => 'Stac',
        'age' => '19'
    ]);
});
Route::get("/eventos", function(){
    return view('administrar.eventos');
})->middleware(['auth'])->name('eventos');
