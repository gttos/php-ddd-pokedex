<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon\Domain;

use Pokedex\Web\Shared\Domain\WebPokemon\PokemonId;
use Pokedex\Tests\Shared\Domain\UuidMother;

final class PokemonIdMother
{
    public static function create(?string $value = null): PokemonId
    {
        return new PokemonId($value ?? UuidMother::create());
    }
}
