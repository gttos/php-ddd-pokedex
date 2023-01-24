<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Domain;

use Pokedex\Shared\Domain\Criteria\Criteria;

interface BackofficeCourseRepository
{
    public function save(BackofficeCourse $course): void;

    public function searchAll(): array;

    public function matching(Criteria $criteria): array;
}
