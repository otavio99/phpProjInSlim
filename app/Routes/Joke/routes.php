<?php
declare(strict_types=1);

use App\Application\Actions\Joke\ListJokesAction;
use App\Application\Actions\Joke\IndexHomeAction;
use App\Application\Actions\Joke\AddJokeAction;
use App\Application\Actions\Joke\DeleteJokeAction;
use App\Application\Actions\Joke\UpdateJokeAction;


use Slim\Interfaces\RouteCollectorProxyInterface as Group;



return function (Group $group) {
    $group->get('', IndexHomeAction::class);
    $group->get('jokes', ListJokesAction::class);
    $group->get('add', AddJokeAction::class);
    $group->post('add', AddJokeAction::class);
    $group->post('delete', DeleteJokeAction::class);
    $group->post('update', UpdateJokeAction::class);
};