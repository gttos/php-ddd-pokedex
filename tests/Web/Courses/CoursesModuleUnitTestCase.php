<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses;

use Pokedex\Web\Courses\Domain\Course;
use Pokedex\Web\Courses\Domain\CourseRepository;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CoursesModuleUnitTestCase extends UnitTestCase
{
    private CourseRepository|MockInterface|null $repository;

    protected function shouldSave(Course $course): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($course))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(CourseId $id, ?Course $course): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($course);
    }

    protected function repository(): CourseRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(CourseRepository::class);
    }
}
