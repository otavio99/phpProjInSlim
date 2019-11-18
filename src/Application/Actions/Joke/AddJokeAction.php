<?php
declare(strict_types=1);

namespace App\Application\Actions\Joke;

use Psr\Http\Message\ResponseInterface as Response;
use App\UI\Joke\JokeAddPage as Page;
use App\Domain\Joke\Joke as Joke;

class AddJokeAction extends JokeAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $post= $this->request->getParsedBody();
        
        if(!empty($post["joke"])){
            $this->jokeRepository->insert(new Joke(0, $post["joke"]));
            $this->logger->info("Adding a joke.");
            $view= new Page();
            $this->response->getBody()->write($view->show(["response"=> "Joke Saved"]));
        }
        else{
            $view= new Page();
            $this->response->getBody()->write($view->show());
        }
        return $this->response;
    }

}
