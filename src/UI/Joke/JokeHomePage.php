<?php
declare(strict_types=1);

namespace App\UI\Joke;

use App\UI\Renderer as Renderer;

class JokeHomePage extends Renderer{
	

	public function show():string{
		$this->page = $this->fileExists(__DIR__ . "/../templates/JokeTemplates/layout.tpl");

		$this->components= array(
			"style"=> $this->fileExists(__DIR__ . "/../templates/css/jokes.css"),
			"content"=> $this->fileExists(__DIR__ . "/../templates/JokeTemplates/home.tpl"),
			 "title"=> "Just a Joke",
		);
		
		$this->mount();

		return $this->page;
	}
}