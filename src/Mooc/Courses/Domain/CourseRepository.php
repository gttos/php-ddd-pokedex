<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Courses\Domain;

use Pokedex\Mooc\Shared\Domain\Courses\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}
