<?php

declare(strict_types=1);

namespace Pokedex\Web\Courses\Domain;

use Pokedex\Web\Shared\Domain\Courses\CourseId;

interface CourseRepository
{
    public function save(Course $course): void;

    public function search(CourseId $id): ?Course;
}
