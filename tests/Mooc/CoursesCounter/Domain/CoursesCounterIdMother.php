<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\CoursesCounter\Domain;

use Pokedex\Mooc\CoursesCounter\Domain\CoursesCounterId;
use Pokedex\Tests\Shared\Domain\UuidMother;

final class CoursesCounterIdMother
{
    public static function create(?string $value = null): CoursesCounterId
    {
        return new CoursesCounterId($value ?? UuidMother::create());
    }
}
