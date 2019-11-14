<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Joke;

use App\Domain\Joke\Joke as Joke;
use App\Domain\Joke\JokeNotFoundException as JokeNotFoundException;
use App\Domain\Joke\JokeNotInsertedException as JokeNotInsertedException;
use App\Domain\Joke\JokeRepository as JokeRepository;
use PDO;
class DaoJokeRepository implements JokeRepository
{
    /**
     * @var Joke[]
     */
    private $jokes;
		
		
		private $pdo;

    /**
     * InMemoryUserRepository constructor.
     *
     * @param array|null $jokes
     */
    public function __construct(PDO $pdo)
    {
      $this->pdo= $pdo;
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
      $result= $this->pdo->query("SELECT * FROM joke");
			return $result->fetchAll(PDO::FETCH_BOTH);
    }

    /**
     * {@inheritdoc}
     */
    public function findJokeOfId(int $id): Joke
    {

       $stmt = $this->pdo->prepare("SELECT * FROM joke WHERE id=(:id)");
				if($stmt->execute(["id" => $id])){
					//header('location: addPage'); 
				}else{
					throw new JokeNotFoundException();
				}
				
				$result= $stmt->execute(["id" => $joke->getId()]);
				return $result->fetchAll(PDO::FETCH_BOTH);
				
    }
		
		public function insert(Joke $joke){
		
				$stmt = $this->pdo->prepare("INSERT INTO joke (joke) VALUES (:joke)");
				if($stmt->execute(["joke" => $joke->getJoke()])){
					//header('location: addPage'); 
				}else{
					throw new JokeNotInsertedException();
				}
			
		}
		
		public function delete(string $id){
			$stmt = $this->pdo->prepare("DELETE FROM joke WHERE id = (:id)");
			if($stmt->execute(["id" => $id])){
				//header('location: jokes'); 
			}
		}
		
		public function update(Joke $joke){
			$stmt = $this->pdo->prepare("UPDATE joke
				SET joke = :joke
				WHERE id = :id" );
			if($stmt->execute([
					"id" => $joke->getId(),
					"joke" => $joke->getJoke()
			])){
				//header('location: jokes'); 
				$up= 1;
			}else{
				throw new JokeNotInsertedException();
			}
			
		}
}
