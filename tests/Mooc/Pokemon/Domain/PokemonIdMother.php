<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Domain;

use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Tests\Shared\Domain\UuidMother;

final class PokemonIdMother
{
    public static function create(?string $value = null): PokemonId
    {
        return new PokemonId($value ?? UuidMother::create());
    }
}
