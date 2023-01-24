<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Courses\Application\Find;

use Pokedex\Mooc\Courses\Domain\Course;
use Pokedex\Mooc\Courses\Domain\CourseNotExist;
use Pokedex\Mooc\Courses\Domain\CourseRepository;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;

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
