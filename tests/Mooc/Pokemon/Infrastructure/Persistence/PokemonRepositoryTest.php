<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Infrastructure\Persistence;

use Pokedex\Tests\Mooc\Pokemon\Domain\PokemonIdMother;
use Pokedex\Tests\Mooc\Pokemon\Domain\PokemonMother;
use Pokedex\Tests\Mooc\Pokemon\PokemonModuleInfrastructureTestCase;

final class PokemonRepositoryTest extends PokemonModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_pokemon(): void
    {
        $pokemon = PokemonMother::create();

        $this->repository()->save($pokemon);
    }

    /** @test */
    public function it_should_return_an_existing_pokemon(): void
    {
        $pokemon = PokemonMother::create();

        $this->repository()->save($pokemon);

        $this->assertEquals($pokemon, $this->repository()->search($pokemon->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_pokemon(): void
    {
        $this->assertNull($this->repository()->search(PokemonIdMother::create()));
    }
}
