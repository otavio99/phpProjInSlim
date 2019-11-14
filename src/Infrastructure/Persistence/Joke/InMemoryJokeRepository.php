<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Joke;

use App\Domain\Joke\Joke as Joke;
use App\Domain\Joke\JokeNotFoundException as JokeNotFoundException;
use App\Domain\Joke\JokeNotFoundException as JokeNotInsertedException;
use App\Domain\Joke\JokeRepository as JokeRepository;

class InMemoryJokeRepository implements JokeRepository
{
    /**
     * @var Joke[]
     */
    private $jokes;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $jokes
     */
    public function __construct(array $jokes = null)
    {
        $this->jokes = $jokes ?? [
            1 => new Joke(1, 'I dont know who I am'),
            2 => new Joke(2, 'Who I am, a guy asked me'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->jokes);
    }

    /**
     * {@inheritdoc}
     */
    public function findJokeOfId(int $id): Joke
    {
        if (!isset($this->jokes[$id])) {
            throw new JokeNotFoundException();
        }

        return $this->jokes[$id];
    }
		
		public function insert(Joke $joke){
			
				///throw new JokeNotFoundException();
			
			$this->jokes[]= $joke;
			
		}
		
		
		public function delete(int $id){}
		
		public function update(Joke $joke){}
}
