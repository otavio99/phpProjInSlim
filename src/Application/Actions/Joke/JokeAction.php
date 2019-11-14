<?php
declare(strict_types=1);

namespace App\Application\Actions\Joke;

use App\Application\Actions\Action as Action;
use App\Domain\Joke\JokeRepository as JokeRepository;
use Psr\Log\LoggerInterface as LoggerInterface;

abstract class JokeAction extends Action
{
    /**
     * @var JokeRepository
     */
    protected $jokeRepository;

    /**
     * @param LoggerInterface $logger
     * @param JokeRepository  $jokeRepository
     */
    public function __construct(LoggerInterface $logger, JokeRepository $jokeRepository)
    {
        parent::__construct($logger);
        $this->jokeRepository = $jokeRepository;
    }
}
