<?php

declare(strict_types=1);

namespace Pokedex\Mooc\Pokemon\Infrastructure\Persistence\Doctrine;

use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class PokemonIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return PokemonId::class;
    }
}
