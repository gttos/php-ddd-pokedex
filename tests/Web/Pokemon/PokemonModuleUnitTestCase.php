<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon;

use Pokedex\Web\Pokemon\Domain\Pokemon;
use Pokedex\Web\Pokemon\Domain\PokemonRepository;
use Pokedex\Web\Shared\Domain\Courses\CourseId;
use Pokedex\Web\Shared\Domain\Pokemon\PokemonId;
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
