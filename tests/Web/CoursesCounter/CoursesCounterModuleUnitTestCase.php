<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\CoursesCounter;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounter;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterRepository;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CoursesCounterModuleUnitTestCase extends UnitTestCase
{
    private CoursesCounterRepository|MockInterface|null $repository;

    protected function shouldSave(CoursesCounter $course): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->once()
            ->with($this->similarTo($course))
            ->andReturnNull();
    }

    protected function shouldSearch(?CoursesCounter $counter): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->once()
            ->andReturn($counter);
    }

    protected function repository(): CoursesCounterRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(CoursesCounterRepository::class);
    }
}
