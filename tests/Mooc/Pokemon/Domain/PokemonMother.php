<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Domain;

use Pokedex\Mooc\Pokemon\Application\Create\CreatePokemonCommand;
use Pokedex\Mooc\Pokemon\Domain\Pokemon;
use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Mooc\Shared\Domain\Pokemon\PokemonId;

final class PokemonMother
{
    public static function create(
        ?PokemonId $id = null,
        ?PokemonName $name = null,
        ?PokemonNumber $number = null
    ): Pokemon {
        return new Pokemon(
            $id ?? PokemonIdMother::create(),
            $name ?? PokemonNameMother::create(),
            $number ?? PokemonNumberMother::create()
        );
    }

    public static function fromRequest(CreatePokemonCommand $request): Pokemon
    {
        return self::create(
            PokemonIdMother::create($request->id()),
            PokemonNameMother::create($request->name()),
            PokemonNumberMother::create($request->number())
        );
    }
}
