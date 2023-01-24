<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Domain;

use Pokedex\Tests\Shared\Infrastructure\Mockery\PokedexMatcherIsSimilar;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\Constraint\PokedexConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new PokedexConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new PokedexConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

    public static function similarTo($value, $delta = 0.0): PokedexMatcherIsSimilar
    {
        return new PokedexMatcherIsSimilar($value, $delta);
    }
}
