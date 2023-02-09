<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Domain;

use Pokedex\Mooc\Pokemon\Domain\PokemonNumber;
use Pokedex\Tests\Shared\Domain\IntegerMother;

final class PokemonNumberMother
{
    public static function create(?int $value = null): PokemonNumber
    {
        return new PokemonNumber($value ?? IntegerMother::lessThan(1279));
    }
}
