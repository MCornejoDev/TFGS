<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Livewire\Character\Index as CharacterIndex;
use App\Livewire\Character\Info as CharacterInfo;
use App\Livewire\Game\Index as GameIndex;
use App\Livewire\Game\Info as GameInfo;
use App\Livewire\Map\Index as MapIndex;
use App\Livewire\Tool\Index as ToolIndex;
use App\Livewire\User\Index as UserIndex;
use App\Livewire\User\Info as UserInfo;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', Welcome::class)->name('home');
    Route::get('/games', GameIndex::class)->name('games.index');
    Route::get('/games/{id}', GameInfo::class)->name('games.info');
    Route::get('/characters', CharacterIndex::class)->name('characters.index');
    Route::get('/characters/{id}', CharacterInfo::class)->name('characters.info');

    Route::get('/tools', ToolIndex::class)->name('tools.index');
    Route::get('/maps', MapIndex::class)->name('maps.index');

    Route::get('/users', UserIndex::class)->name('users.index')->can('viewUsers');
    Route::get('/user/info', UserInfo::class)->name('user.info'); //The user can see his own details or the admin user can see the details of any user
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});
