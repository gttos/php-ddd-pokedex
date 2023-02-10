<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses\Domain;

use Pokedex\Web\Courses\Domain\CourseName;
use Pokedex\Tests\Shared\Domain\WordMother;

final class CourseNameMother
{
    public static function create(?string $value = null): CourseName
    {
        return new CourseName($value ?? WordMother::create());
    }
}
