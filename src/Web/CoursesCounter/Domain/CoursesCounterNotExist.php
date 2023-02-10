<?php

declare(strict_types=1);

namespace Pokedex\Web\CoursesCounter\Domain;

use RuntimeException;

final class CoursesCounterNotExist extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('The courses counter not exist');
    }
}
