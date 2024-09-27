<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Character\Index as CharacterIndex;
use App\Livewire\Character\Info as CharacterInfo;
use App\Livewire\Game\Index as GameIndex;
use App\Livewire\Tool\Index as ToolIndex;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

// For admin middlewares
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', Welcome::class)->name('home');
    Route::get('/games', GameIndex::class)->name('games.index');
    Route::get('/characters', CharacterIndex::class)->name('characters.index');
    Route::get('/characters/{id}', CharacterInfo::class)->name('characters.info');

    Route::get('/tools', ToolIndex::class)->name('tools.index');
    // Route::get('/crear', [
    //     'as' => 'crear',
    //     'uses' => 'CrearPersonajeController@index'
    // ]);

    // Route::post('crear', [
    //     'as' => 'registrar',
    //     'uses' => 'CrearPersonajeController@registrar'
    // ]);

    // /*Route::get('comprobar',[
    //     'as'=>'comprobar',
    //     'uses'=> 'CrearPersonajeController@comprobar'
    // ]);*/

    // /*Ver personajes*/

    // Route::get('personajes', [
    //     'as' => 'mostrarTodos',
    //     'uses' => 'MostrarPersonajeController@mostrarTodos'
    // ]);

    // Route::get('personaje/{id}', [
    //     'as' => 'mostrar',
    //     'uses' => 'MostrarPersonajeController@mostrar'
    // ]);

    // Route::get('personaje/gráfica/{id}', [
    //     'as' => 'grafica',
    //     'uses' => 'MostrarPersonajeController@grafica'
    // ]);

    // /*Modificar personaje*/

    // Route::post('personaje/{id}', [
    //     'as' => 'modificar',
    //     'uses' => 'MostrarPersonajeController@modificar'
    // ]);

    // /*Eliminar personajes*/

    // Route::get('personaje/eliminar/{id}', [
    //     'as' => 'eliminar',
    //     'uses' => 'MostrarPersonajeController@eliminarPersonaje'
    // ]);

    // /*Descargar mapas*/

    // Route::get('mapas', [
    //     'as' => 'mapas',
    //     'uses' => 'MostrarMapasController@mostrar'
    // ]);

    // /*Herramientas y estadisticas*/

    // Route::get('herramientas', [
    //     'as' => 'herramientas',
    //     'uses' => 'HerramientasController@herramienta'
    // ]);

    // /*Configuración de cuentas*/

    // Route::get('/configuración', [
    //     'as' => 'configuracion',
    //     'uses' => 'HerramientasController@configuracion'
    // ]);

    // Route::post('actualizar', [
    //     'as' => 'actualizar',
    //     'uses' => 'HerramientasController@actualizar'
    // ]);

    // Route::get('configuracion/eliminar', [
    //     'as' => 'eliminarCuenta',
    //     'uses' => 'HerramientasController@eliminarCuenta'
    // ]);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
