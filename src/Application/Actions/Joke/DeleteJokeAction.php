<?php
declare(strict_types=1);

namespace App\Application\Actions\Joke;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Joke\Joke as Joke;

class DeleteJokeAction extends JokeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
			$this->jokeRepository->delete($_POST["id"]);
			$this->logger->info("Deleting a joke.");
	
			return $this->response->withHeader("Location", "jokes")->withStatus(302);
    }
		
}
