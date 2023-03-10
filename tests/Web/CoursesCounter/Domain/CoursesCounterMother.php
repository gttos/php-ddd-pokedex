<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\CoursesCounter\Domain;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounter;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterId;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterTotal;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Tests\Web\Courses\Domain\CourseIdMother;
use Pokedex\Tests\Shared\Domain\Repeater;

final class CoursesCounterMother
{
    public static function create(
        ?CoursesCounterId $id = null,
        ?CoursesCounterTotal $total = null,
        CourseId ...$existingCourses
    ): CoursesCounter {
        return new CoursesCounter(
            $id ?? CoursesCounterIdMother::create(),
            $total ?? CoursesCounterTotalMother::create(),
            ...count($existingCourses) ? $existingCourses : Repeater::random(fn () => CourseIdMother::create())
        );
    }

    public static function withOne(CourseId $courseId): CoursesCounter
    {
        return self::create(CoursesCounterIdMother::create(), CoursesCounterTotalMother::one(), $courseId);
    }

    public static function incrementing(CoursesCounter $existingCounter, CourseId $courseId): CoursesCounter
    {
        return self::create(
            $existingCounter->id(),
            CoursesCounterTotalMother::create($existingCounter->total()->value() + 1),
            ...array_merge($existingCounter->existingCourses(), [$courseId])
        );
    }
}
