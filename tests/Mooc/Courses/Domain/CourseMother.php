<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Courses\Domain;

use Pokedex\Mooc\Courses\Application\Create\CreateCourseCommand;
use Pokedex\Mooc\Courses\Domain\Course;
use Pokedex\Mooc\Courses\Domain\CourseDuration;
use Pokedex\Mooc\Courses\Domain\CourseName;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;

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
