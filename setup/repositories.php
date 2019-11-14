<?php
declare(strict_types=1);

use App\Domain\Joke\JokeRepository;
use App\Infrastructure\Persistence\Joke\DaoJokeRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our JokeRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        JokeRepository::class => \DI\autowire(DaoJokeRepository::class),
    ]);
};
