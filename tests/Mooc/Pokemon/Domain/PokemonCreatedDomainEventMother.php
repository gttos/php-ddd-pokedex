<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Domain;

use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonCreatedDomainEvent;
use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;

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
