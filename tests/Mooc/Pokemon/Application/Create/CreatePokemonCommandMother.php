<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Application\Create;

use Pokedex\Mooc\Pokemon\Application\Create\CreatePokemonCommand;
use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;
use Pokedex\Tests\Mooc\Pokemon\Domain\PokemonIdMother;
use Pokedex\Tests\Mooc\Pokemon\Domain\PokemonNameMother;

final class CreatePokemonCommandMother
{
    public static function create(
        ?PokemonId $id = null,
        ?PokemonName $name = null
    ): CreatePokemonCommand {
        return new CreatePokemonCommand(
            $id?->value() ?? PokemonIdMother::create()->value(),
            $name?->value() ?? PokemonNameMother::create()->value()
        );
    }
}
