<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Courses\Infrastructure\Persistence;

use Pokedex\Mooc\Courses\Domain\Course;
use Pokedex\Mooc\Courses\Domain\CourseRepository;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
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
