<?php
declare(strict_types=1);

namespace App\Domain\Joke;

use JsonSerializable;

class Joke implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $joke;

   

    /**
     * @param int|null  $id
     * @param string    $joke
     */
    public function __construct(?int $id, string $joke)
    {
        $this->id = $id;
        $this->joke = $joke;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getJoke(): string
    {
        return $this->joke;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'joke' => $this->joke,
        ];
    }
		
		public function toArray(){
			
			return [
            'id' => $this->id,
            'joke' => $this->joke,
        ];
			
		}
}
