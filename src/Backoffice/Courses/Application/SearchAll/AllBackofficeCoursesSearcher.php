<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Application\SearchAll;

use Pokedex\Backoffice\Courses\Application\BackofficeCourseResponse;
use Pokedex\Backoffice\Courses\Application\BackofficeCoursesResponse;
use Pokedex\Backoffice\Courses\Domain\BackofficeCourse;
use Pokedex\Backoffice\Courses\Domain\BackofficeCourseRepository;
use function Lambdish\Phunctional\map;

final class AllBackofficeCoursesSearcher
{
    public function __construct(private readonly BackofficeCourseRepository $repository)
    {
    }

    public function searchAll(): BackofficeCoursesResponse
    {
        return new BackofficeCoursesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn (BackofficeCourse $course) => new BackofficeCourseResponse(
            $course->id(),
            $course->name(),
            $course->duration()
        );
    }
}
