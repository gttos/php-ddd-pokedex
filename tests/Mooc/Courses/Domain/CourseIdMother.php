<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Courses\Domain;

use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Tests\Shared\Domain\UuidMother;

final class CourseIdMother
{
    public static function create(?string $value = null): CourseId
    {
        return new CourseId($value ?? UuidMother::create());
    }
}
