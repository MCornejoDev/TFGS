<?php

// routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.

use App\Models\Character;
use App\Models\Game;
use Diglactic\Breadcrumbs\Breadcrumbs;
// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push(__('home.title'), route('home'));
});

Breadcrumbs::for('characters.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('characters.characters'), route('characters.index'));
});

Breadcrumbs::for('characters.info', function (BreadcrumbTrail $trail) {
    $trail->parent('characters.index');
    $character = Character::find(request()->route('id'));

    if (! $character) {
        return abort(404, __('characters.character.abort'));
    }

    $trail->push($character->name, route('characters.info', $character->id));
});

Breadcrumbs::for('games.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('games.games'), route('games.index'));
});

Breadcrumbs::for('games.info', function (BreadcrumbTrail $trail) {
    $trail->parent('games.index');
    $game = Game::find(request()->route('id'));

    if (! $game) {
        return abort(404, __('games.game.abort'));
    }

    $trail->push($game->name, route('games.info', $game->id));
});

Breadcrumbs::for('tools.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('tools.tools'), route('tools.index'));
});

Breadcrumbs::for('maps.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('maps.maps'), route('maps.index'));
});

Breadcrumbs::for('user.details', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push(__('users.details'));
    $trail->push(Auth::user()->name);
});
