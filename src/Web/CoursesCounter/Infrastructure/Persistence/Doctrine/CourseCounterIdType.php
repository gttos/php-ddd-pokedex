<?php

declare(strict_types=1);

namespace Pokedex\Web\CoursesCounter\Infrastructure\Persistence\Doctrine;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounterId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class CourseCounterIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return CoursesCounterId::class;
    }
}
