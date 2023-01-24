<?php

declare(strict_types=1);

namespace Pokedex\Tests\Mooc\CoursesCounter\Application\Find;

use Pokedex\Mooc\CoursesCounter\Application\Find\CoursesCounterResponse;
use Pokedex\Mooc\CoursesCounter\Domain\CoursesCounterTotal;
use Pokedex\Tests\Mooc\CoursesCounter\Domain\CoursesCounterTotalMother;

final class CoursesCounterResponseMother
{
    public static function create(?CoursesCounterTotal $total = null): CoursesCounterResponse
    {
        return new CoursesCounterResponse($total?->value() ?? CoursesCounterTotalMother::create()->value());
    }
}
