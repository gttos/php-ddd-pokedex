<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon;

use Pokedex\Mooc\Pokemon\Domain\PokemonRepository;
use Pokedex\Tests\Mooc\Shared\Infrastructure\PhpUnit\MoocContextInfrastructureTestCase;

abstract class PokemonModuleInfrastructureTestCase extends MoocContextInfrastructureTestCase
{
    protected function repository(): PokemonRepository
    {
        return $this->service(PokemonRepository::class);
    }
}
