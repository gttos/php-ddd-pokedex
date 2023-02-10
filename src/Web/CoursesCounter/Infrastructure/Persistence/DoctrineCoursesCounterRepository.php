<?php

declare(strict_types=1);

namespace Pokedex\Web\CoursesCounter\Infrastructure\Persistence;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounter;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterRepository;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCoursesCounterRepository extends DoctrineRepository implements CoursesCounterRepository
{
    public function save(CoursesCounter $counter): void
    {
        $this->persist($counter);
    }

    public function search(): ?CoursesCounter
    {
        return $this->repository(CoursesCounter::class)->findOneBy([]);
    }
}
