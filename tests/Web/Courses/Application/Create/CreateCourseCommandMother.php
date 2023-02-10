<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses\Application\Create;

use Pokedex\Web\Courses\Application\Create\CreateCourseCommand;
use Pokedex\Web\Courses\Domain\CourseDuration;
use Pokedex\Web\Courses\Domain\CourseName;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Tests\Web\Courses\Domain\CourseDurationMother;
use Pokedex\Tests\Web\Courses\Domain\CourseIdMother;
use Pokedex\Tests\Web\Courses\Domain\CourseNameMother;

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
