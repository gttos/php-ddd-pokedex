<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\Pokemon\Domain;

use Pokedex\Mooc\Courses\Domain\CourseName;
use Pokedex\Mooc\Pokemon\Domain\PokemonName;
use Pokedex\Tests\Shared\Domain\WordMother;

final class PokemonNameMother
{
    public static function create(?string $value = null): PokemonName
    {
        return new PokemonName($value ?? WordMother::create());
    }
}
