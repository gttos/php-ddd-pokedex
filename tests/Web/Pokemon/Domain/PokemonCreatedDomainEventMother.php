<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon\Domain;

use Pokedex\Web\Pokemon\Domain\Pokemon;
use Pokedex\Web\Pokemon\Domain\PokemonCreatedDomainEvent;
use Pokedex\Web\Pokemon\Domain\PokemonName;
use Pokedex\Web\Shared\Domain\WebPokemon\PokemonId;

final class PokemonCreatedDomainEventMother
{
    public static function create(
        ?PokemonId $id = null,
        ?PokemonName $name = null
    ): PokemonCreatedDomainEvent {
        return new PokemonCreatedDomainEvent(
            $id?->value() ?? PokemonIdMother::create()->value(),
            $name?->value() ?? PokemonNameMother::create()->value()
        );
    }

    public static function fromCourse(Pokemon $pokemon): PokemonCreatedDomainEvent
    {
        return self::create($pokemon->id(), $pokemon->name());
    }
}
