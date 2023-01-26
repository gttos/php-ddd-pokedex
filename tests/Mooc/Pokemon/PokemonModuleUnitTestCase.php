<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon;

use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Mooc\Shared\Domain\Courses\CourseId;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class PokemonModuleUnitTestCase extends UnitTestCase
{
    private PokemonRepository|MockInterface|null $repository;

    protected function shouldSave(Pokemon $pokemon): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with($this->similarTo($pokemon))
            ->once()
            ->andReturnNull();
    }

    protected function shouldSearch(PokemonId $id, ?Pokemon $course): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($course);
    }

    protected function repository(): PokemonRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(PokemonRepository::class);
    }
}
