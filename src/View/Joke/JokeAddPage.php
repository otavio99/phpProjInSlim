<?php
declare(strict_types=1);

namespace App\View\Joke;

use App\View\Renderer as Renderer;

class JokeAddPage extends Renderer{
	

	public function show($data=null):string{
		$this->page = $this->fileExists(__DIR__ . "/../templates/JokeTemplates/layout.tpl");

		
		$this->components= array(
			"style"=> $this->fileExists(__DIR__ . "/../templates/css/jokes.css"),
			"content"=> $this->fileExists(__DIR__ . "/../templates/JokeTemplates/addjoke.tpl"),
			 "title"=> "Just a Joke",
			 "response"=>  $data["response"]? $data["response"]:" ",
		);

		
		$this->mount();

		return $this->page;
	}
}