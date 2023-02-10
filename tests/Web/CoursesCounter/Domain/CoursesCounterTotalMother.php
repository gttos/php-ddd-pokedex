<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\CoursesCounter\Domain;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounterTotal;
use Pokedex\Tests\Shared\Domain\IntegerMother;

final class CoursesCounterTotalMother
{
    public static function create(?int $value = null): CoursesCounterTotal
    {
        return new CoursesCounterTotal($value ?? IntegerMother::create());
    }

    public static function one(): CoursesCounterTotal
    {
        return self::create(1);
    }

    public static function random(): CoursesCounterTotal
    {
        return self::create(IntegerMother::create());
    }
}
