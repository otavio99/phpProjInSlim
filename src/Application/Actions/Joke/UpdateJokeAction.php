<?php
declare(strict_types=1);

namespace App\Application\Actions\Joke;

use Psr\Http\Message\ResponseInterface as Response;
use App\UI\Joke\JokeUpdatePage as Page;
use App\Domain\Joke\Joke as Joke;

class UpdateJokeAction extends JokeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $post= $this->request->getParsedBody();
        if(!empty($post["update"])){
            $this->jokeRepository->update(new Joke(intval($post["id"]), $post["joke"]));
            $this->logger->info("Updating a joke.");
            return $this->response->withHeader("Location", "jokes")->withStatus(302);
        }
        else{
            $view= new Page();
            $this->response->getBody()->write($view->show());
        }

        return $this->response;
    }
		
}
