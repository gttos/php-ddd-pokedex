<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon\Domain;

use Pokedex\Web\Pokemon\Domain\PokemonNumber;
use Pokedex\Tests\Shared\Domain\IntegerMother;

final class PokemonNumberMother
{
    public static function create(?int $value = null): PokemonNumber
    {
        return new PokemonNumber($value ?? IntegerMother::lessThan(1279));
    }
}
