<?php

declare(strict_types=1);

namespace Pokedex\Mooc\CoursesCounter\Infrastructure\Persistence;

use Pokedex\Mooc\CoursesCounter\Domain\CoursesCounter;
use Pokedex\Mooc\CoursesCounter\Domain\CoursesCounterRepository;
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
