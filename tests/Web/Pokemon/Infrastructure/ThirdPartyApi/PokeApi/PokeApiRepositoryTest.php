<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon\Infrastructure\ThirdPartyApi\PokeApi;

use Pokedex\Web\Pokemon\Infrastructure\ThirdPartyApi\PokeApi\PokeApiRepository;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

final class PokeApiRepositoryTest extends UnitTestCase
{
    private PokeApiRepository|null $repository;

    protected function repository(): PokeApiRepository
    {
        return $this->repository = $this->repository ?? new PokeApiRepository();
    }

    /** @test */
    public function it_should_get_a_pokemon_list(): void
    {
        $collection = $this->repository()->getPokemonSet(3,0);

        $this->assertEquals('bulbasaur', $collection->first()->name()->value());
        $this->assertEquals('1', $collection->first()->number()->value());
        $this->assertEquals('venusaur', $collection->last()->name()->value());
        $this->assertEquals('3', $collection->last()->number()->value());
    }
}
