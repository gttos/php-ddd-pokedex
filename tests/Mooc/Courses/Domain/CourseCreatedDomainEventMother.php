<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Courses\Domain;

use Pokedex\Mooc\Courses\Domain\Course;
use Pokedex\Mooc\Courses\Domain\CourseCreatedDomainEvent;
use Pokedex\Mooc\Courses\Domain\CourseDuration;
use Pokedex\Mooc\Courses\Domain\CourseName;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;

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
