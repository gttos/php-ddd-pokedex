<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Courses\Infrastructure\Persistence\Doctrine;

use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CourseId::class;
    }
}
