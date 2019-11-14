<?php
declare(strict_types=1);

namespace App\Domain\Joke;

use App\Domain\DomainException\DomainRecordNotFoundException;

class JokeNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The joke you requested does not exist.';
}
