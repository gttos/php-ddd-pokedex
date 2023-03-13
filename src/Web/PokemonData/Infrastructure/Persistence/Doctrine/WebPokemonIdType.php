<?php

declare(strict_types=1);

namespace Pokedex\Web\PokemonData\Infrastructure\Persistence\Doctrine;

use Pokedex\Web\Shared\Domain\WebPokemon\WebPokemonId;
use Pokedex\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class WebPokemonIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'web_pokemon_id';
    }

    protected function typeClassName(): string
    {
        return WebPokemonId::class;
    }
}
