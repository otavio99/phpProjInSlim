<?php
declare(strict_types=1);

namespace App\View\Joke;

use App\View\Renderer as Renderer;

class JokeListPage extends Renderer{
	

	public function show($data=array()):string{
		$this->page = $this->fileExists(__DIR__ . "/../templates/JokeTemplates/layout.tpl");

		
		$this->mountList(
			$data,
			$this->fileExists(__DIR__ . '/../templates/JokeTemplates/jokeitem.tpl'),
			7
		);
		
		$this->components= array(
			"style"=> $this->fileExists(__DIR__ . "/../templates/css/jokes.css"),
			"content"=> $this->htmlList,
			 "title"=> "Just a Joke",
		);

		
		$this->mount();

		return $this->page;
	}
}