<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Application\Create;

use Pokedex\Backoffice\Courses\Domain\BackofficeCourse;
use Pokedex\Backoffice\Courses\Domain\BackofficeCourseRepository;

final class BackofficeCourseCreator
{
    public function __construct(private readonly BackofficeCourseRepository $repository)
    {
    }

    public function create(string $id, string $name, string $duration): void
    {
        $this->repository->save(new BackofficeCourse($id, $name, $duration));
    }
}
