<?php
declare(strict_types=1);

namespace App\Application\Actions\Joke;

use App\Domain\Joke\Joke as Joke;

use Psr\Http\Message\ResponseInterface as Response;
use App\UI\Joke\JokeListPage as Page;

class ListJokesAction extends JokeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $jokes = $this->jokeRepository->findAll();

        $this->logger->info("Listing jokes");
			
				$view= new Page();
        $this->response->getBody()->write($view->show($jokes));
				
        return $this->response;
    }
}
