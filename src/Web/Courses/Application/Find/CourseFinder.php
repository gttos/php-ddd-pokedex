<?php

declare(strict_types=1);

namespace Pokedex\Web\Courses\Application\Find;

use Pokedex\Web\Courses\Domain\Course;
use Pokedex\Web\Courses\Domain\CourseNotExist;
use Pokedex\Web\Courses\Domain\CourseRepository;
use Pokedex\Web\Shared\Domain\Courses\CourseId;

final class CourseFinder
{
    public function __construct(private readonly CourseRepository $repository)
    {
    }

    public function __invoke(CourseId $id): Course
    {
        $course = $this->repository->search($id);

        if (null === $course) {
            throw new CourseNotExist($id);
        }

        return $course;
    }
}
