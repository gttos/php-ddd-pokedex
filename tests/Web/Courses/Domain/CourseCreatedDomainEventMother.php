<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses\Domain;

use Pokedex\Web\Courses\Domain\Course;
use Pokedex\Web\Courses\Domain\CourseCreatedDomainEvent;
use Pokedex\Web\Courses\Domain\CourseDuration;
use Pokedex\Web\Courses\Domain\CourseName;
use Pokedex\Web\Shared\Domain\Courses\CourseId;

final class CourseCreatedDomainEventMother
{
    public static function create(
        ?CourseId $id = null,
        ?CourseName $name = null,
        ?CourseDuration $duration = null
    ): CourseCreatedDomainEvent {
        return new CourseCreatedDomainEvent(
            $id?->value() ?? CourseIdMother::create()->value(),
            $name?->value() ?? CourseNameMother::create()->value(),
            $duration?->value() ?? CourseDurationMother::create()->value()
        );
    }

    public static function fromCourse(Course $course): CourseCreatedDomainEvent
    {
        return self::create($course->id(), $course->name(), $course->duration());
    }
}
