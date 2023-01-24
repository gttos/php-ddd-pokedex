<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Domain;

final class RandomElementPicker
{
    public static function from(...$elements): mixed
    {
        return MotherCreator::random()->randomElement($elements);
    }
}
