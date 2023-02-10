<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\CoursesCounter\Domain;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounterId;
use Pokedex\Tests\Shared\Domain\UuidMother;

final class CoursesCounterIdMother
{
    public static function create(?string $value = null): CoursesCounterId
    {
        return new CoursesCounterId($value ?? UuidMother::create());
    }
}
