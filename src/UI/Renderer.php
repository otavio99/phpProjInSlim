<?php
declare(strict_types=1);

namespace App\UI;

abstract class Renderer{
	protected $page= "";
	
	protected $components= array();
	
	protected $htmlList= "";
	
    
    abstract public function show(array $data):string;
    
	//return html content from file
	protected function getHtmlContent($file):string{
		return file_get_contents($file);
	}

	//verify if file exists, if yes return the content, no return empty string
	protected function fileExists($file):string{
		if (!file_exists($file)){
			return " ";
		}
		else{
			return $this->getHtmlContent($file);
		}
	}

	protected function hello(){
		return "hello";
	}

	//take out the first element of array and return the array
	protected function takeFirstElement($arr=[]){
		array_shift($arr);
		return $arr;
	}

	//set value in content by making use of array with "key" => "values";
	//Ex1: $values= array("word" => "World!!!", "phrase" => "How are you?");
	//Ex2: $values= array("title" => "<h1>Hello World!!!</h1>");
	protected function setContent($arr=array(), $page=" "):string{
			if($arr!=null)
					return $this->setContent($this->takeFirstElement($arr), str_replace("[@".key($arr)."]", current($arr), $page));
			return $page;
	}

	//falta explicar
	protected function setList($arr,string $item,int $qtd,string $list=" "):string{
		$qtd= $qtd-1;
			if($arr & $qtd!=-1){
					return $list.= $this->setList($this->takeFirstElement($arr), $item, $qtd, $this->setContent(current($arr),$item));
			}
			return $list;
	}

	
	public function mount(){
		$this->page= $this->setContent($this->components, $this->page);
	}
	
	public function mountList(array $arr=[], string $item, int $qtd){
			$this->htmlList= $this->setList($arr, $item,$qtd);
	}
	
	


}