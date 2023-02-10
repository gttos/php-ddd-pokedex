<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses\Domain;

use Pokedex\Web\Courses\Application\Create\CreateCourseCommand;
use Pokedex\Web\Courses\Domain\Course;
use Pokedex\Web\Courses\Domain\CourseDuration;
use Pokedex\Web\Courses\Domain\CourseName;
use Pokedex\Web\Shared\Domain\Courses\CourseId;

final class CourseMother
{
    public static function create(
        ?CourseId $id = null,
        ?CourseName $name = null,
        ?CourseDuration $duration = null
    ): Course {
        return new Course(
            $id ?? CourseIdMother::create(),
            $name ?? CourseNameMother::create(),
            $duration ?? CourseDurationMother::create()
        );
    }

    public static function fromRequest(CreateCourseCommand $request): Course
    {
        return self::create(
            CourseIdMother::create($request->id()),
            CourseNameMother::create($request->name()),
            CourseDurationMother::create($request->duration())
        );
    }
}
