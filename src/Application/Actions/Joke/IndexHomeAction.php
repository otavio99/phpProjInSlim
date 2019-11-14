<?php
declare(strict_types=1);

namespace App\Application\Actions\Joke;

use Psr\Http\Message\ResponseInterface as Response;
use App\View\Joke\JokeHomePage as Page;

class IndexHomeAction extends JokeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        $this->logger->info("Home page was viewed.");
				
				$view= new Page();
        $this->response->getBody()->write($view->show());
				
				return $this->response;
    }
		
}
