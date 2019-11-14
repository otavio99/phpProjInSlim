<?php
declare(strict_types=1);

namespace App\Domain\Joke;

interface JokeRepository
{
    /**
     * @return Joke[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Joke
     * @throws JokeNotFoundException
     */
    public function findJokeOfId(int $id): Joke;
		
		public function insert(Joke $joke);
		
		public function delete(string $id);
		
		public function update(Joke $joke);
}
