<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon;

use Pokedex\Web\Pokemon\Domain\PokemonRepository;
use Pokedex\Tests\Web\Shared\Infrastructure\PhpUnit\WebContextInfrastructureTestCase;

abstract class PokemonModuleInfrastructureTestCase extends WebContextInfrastructureTestCase
{
    protected function repository(): PokemonRepository
    {
        return $this->service(PokemonRepository::class);
    }
}
