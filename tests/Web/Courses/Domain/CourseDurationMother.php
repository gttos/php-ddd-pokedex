<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\Courses\Domain;

use Pokedex\Web\Courses\Domain\CourseDuration;
use Pokedex\Tests\Shared\Domain\IntegerMother;
use Pokedex\Tests\Shared\Domain\RandomElementPicker;

final class CourseDurationMother
{
    public static function create(?string $value = null): CourseDuration
    {
        return new CourseDuration($value ?? self::random());
    }

    private static function random(): string
    {
        return sprintf(
            '%s %s',
            IntegerMother::lessThan(100),
            RandomElementPicker::from('months', 'years', 'days', 'hours', 'minutes', 'seconds')
        );
    }
}
