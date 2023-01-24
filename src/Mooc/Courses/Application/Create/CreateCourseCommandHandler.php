<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Courses\Application\Create;

use Pokedex\Mooc\Courses\Domain\CourseDuration;
use Pokedex\Mooc\Courses\Domain\CourseName;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCourseCommandHandler implements CommandHandler
{
    public function __construct(private readonly CourseCreator $creator)
    {
    }

    public function __invoke(CreateCourseCommand $command): void
    {
        $id       = new CourseId($command->id());
        $name     = new CourseName($command->name());
        $duration = new CourseDuration($command->duration());

        $this->creator->__invoke($id, $name, $duration);
    }
}
