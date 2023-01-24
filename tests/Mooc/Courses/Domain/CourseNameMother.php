<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Courses\Domain;

use Pokedex\Mooc\Courses\Domain\CourseName;
use Pokedex\Tests\Shared\Domain\WordMother;

final class CourseNameMother
{
    public static function create(?string $value = null): CourseName
    {
        return new CourseName($value ?? WordMother::create());
    }
}
