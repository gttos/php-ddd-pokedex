<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\CoursesCounter\Application\Find;

use Pokedex\Web\CoursesCounter\Application\Find\CoursesCounterResponse;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterTotal;
use Pokedex\Tests\Web\CoursesCounter\Domain\CoursesCounterTotalMother;

final class CoursesCounterResponseMother
{
    public static function create(?CoursesCounterTotal $total = null): CoursesCounterResponse
    {
        return new CoursesCounterResponse($total?->value() ?? CoursesCounterTotalMother::create()->value());
    }
}
