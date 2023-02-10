<?php

declare(strict_types=1);

namespace Pokedex\Web\Courses\Infrastructure\Persistence;

use Pokedex\Web\Courses\Domain\Course;
use Pokedex\Web\Courses\Domain\CourseRepository;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class MySqlCourseRepository extends DoctrineRepository implements CourseRepository
{
    public function save(Course $course): void
    {
        $this->persist($course);
    }

    public function search(CourseId $id): ?Course
    {
        return $this->repository(Course::class)->find($id);
    }
}
