<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Pokemon\Domain;

use Pokedex\Web\Courses\Domain\CourseName;
use Pokedex\Web\Pokemon\Domain\PokemonName;
use Pokedex\Tests\Shared\Domain\WordMother;

final class PokemonNameMother
{
    public static function create(?string $value = null): PokemonName
    {
        return new PokemonName($value ?? WordMother::create());
    }
}
