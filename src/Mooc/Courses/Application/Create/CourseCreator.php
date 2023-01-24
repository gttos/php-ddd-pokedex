<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Courses\Application\Create;

use Pokedex\Mooc\Courses\Domain\Course;
use Pokedex\Mooc\Courses\Domain\CourseDuration;
use Pokedex\Mooc\Courses\Domain\CourseName;
use Pokedex\Mooc\Courses\Domain\CourseRepository;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Domain\Bus\Event\EventBus;

final class CourseCreator
{
    public function __construct(private readonly CourseRepository $repository, private readonly EventBus $bus)
    {
    }

    public function __invoke(CourseId $id, CourseName $name, CourseDuration $duration): void
    {
        $course = Course::create($id, $name, $duration);

        $this->repository->save($course);
        $this->bus->publish(...$course->pullDomainEvents());
    }
}
