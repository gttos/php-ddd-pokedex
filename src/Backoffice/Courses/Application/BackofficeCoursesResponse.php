<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Courses\Application;

use Pokedex\Shared\Domain\Bus\Query\Response;

final class BackofficeCoursesResponse implements Response
{
    private readonly array $courses;

    public function __construct(BackofficeCourseResponse ...$courses)
    {
        $this->courses = $courses;
    }

    public function courses(): array
    {
        return $this->courses;
    }
}
