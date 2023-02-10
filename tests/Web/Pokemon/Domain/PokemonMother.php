<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon\Domain;

use Pokedex\Web\Pokemon\Application\Create\CreatePokemonCommand;
use Pokedex\Web\Pokemon\Domain\Pokemon;
use Pokedex\Web\Pokemon\Domain\PokemonName;
use Pokedex\Web\Pokemon\Domain\PokemonNumber;
use Pokedex\Web\Shared\Domain\Pokemon\PokemonId;

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
