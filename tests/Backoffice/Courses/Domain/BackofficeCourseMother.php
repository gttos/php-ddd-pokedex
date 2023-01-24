<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Courses\Domain;

use Pokedex\Backoffice\Courses\Domain\BackofficeCourse;
use Pokedex\Tests\Mooc\Courses\Domain\CourseDurationMother;
use Pokedex\Tests\Mooc\Courses\Domain\CourseIdMother;
use Pokedex\Tests\Mooc\Courses\Domain\CourseNameMother;

final class BackofficeCourseMother
{
    public static function create(?string $id = null, ?string $name = null, ?string $duration = null): BackofficeCourse
    {
        return new BackofficeCourse(
            $id ?? CourseIdMother::create()->value(),
            $name ?? CourseNameMother::create()->value(),
            $duration ?? CourseDurationMother::create()->value()
        );
    }
}
