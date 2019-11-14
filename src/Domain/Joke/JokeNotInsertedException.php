<?php
declare(strict_types=1);

namespace App\Domain\Joke;

use App\Domain\DomainException\DomainRecordNotFoundException;

class JokeNotInsertedException extends DomainRecordNotFoundException
{
    public $message = 'The joke could not be saved.';
}
