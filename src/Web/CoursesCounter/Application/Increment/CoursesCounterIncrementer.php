<?php

declare(strict_types=1);

namespace Pokedex\Web\CoursesCounter\Application\Increment;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounter;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterId;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterRepository;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Domain\Bus\Event\EventBus;
use Pokedex\Shared\Domain\UuidGenerator;

final class CoursesCounterIncrementer
{
    public function __construct(
        private readonly CoursesCounterRepository $repository,
        private readonly UuidGenerator $uuidGenerator,
        private readonly EventBus $bus
    ) {
    }

    public function __invoke(CourseId $courseId): void
    {
        $counter = $this->repository->search() ?: $this->initializeCounter();

        if (!$counter->hasIncremented($courseId)) {
            $counter->increment($courseId);

            $this->repository->save($counter);
            $this->bus->publish(...$counter->pullDomainEvents());
        }
    }

    private function initializeCounter(): CoursesCounter
    {
        return CoursesCounter::initialize(new CoursesCounterId($this->uuidGenerator->generate()));
    }
}
