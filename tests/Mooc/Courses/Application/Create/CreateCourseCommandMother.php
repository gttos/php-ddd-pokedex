<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Courses\Application\Create;

use Pokedex\Mooc\Courses\Application\Create\CreateCourseCommand;
use Pokedex\Mooc\Courses\Domain\CourseDuration;
use Pokedex\Mooc\Courses\Domain\CourseName;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Tests\Mooc\Courses\Domain\CourseDurationMother;
use Pokedex\Tests\Mooc\Courses\Domain\CourseIdMother;
use Pokedex\Tests\Mooc\Courses\Domain\CourseNameMother;

final class CreateCourseCommandMother
{
    public static function create(
        ?CourseId $id = null,
        ?CourseName $name = null,
        ?CourseDuration $duration = null
    ): CreateCourseCommand {
        return new CreateCourseCommand(
            $id?->value() ?? CourseIdMother::create()->value(),
            $name?->value() ?? CourseNameMother::create()->value(),
            $duration?->value() ?? CourseDurationMother::create()->value()
        );
    }
}
