<?php

declare(strict_types=1);

namespace Pokedex\Web\Courses\Application\Update;

use Pokedex\Web\Courses\Application\Find\CourseFinder;
use Pokedex\Web\Courses\Domain\CourseName;
use Pokedex\Web\Courses\Domain\CourseRepository;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Domain\Bus\Event\EventBus;

final class CourseRenamer
{
    private readonly CourseFinder $finder;

    public function __construct(private readonly CourseRepository $repository, private readonly EventBus $bus)
    {
        $this->finder = new CourseFinder($repository);
    }

    public function __invoke(CourseId $id, CourseName $newName): void
    {
        $course = $this->finder->__invoke($id);

        $course->rename($newName);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}
