<?php

declare(strict_types=1);

namespace Pokedex\Tests\Web\CoursesCounter\Domain;

use Pokedex\Web\CoursesCounter\Domain\CoursesCounter;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterId;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterIncrementedDomainEvent;
use Pokedex\Web\CoursesCounter\Domain\CoursesCounterTotal;

final class CoursesCounterIncrementedDomainEventMother
{
    public static function create(
        ?CoursesCounterId $id = null,
        ?CoursesCounterTotal $total = null
    ): CoursesCounterIncrementedDomainEvent {
        return new CoursesCounterIncrementedDomainEvent(
            $id?->value() ?? CoursesCounterIdMother::create()->value(),
            $total?->value() ?? CoursesCounterTotalMother::create()->value()
        );
    }

    public static function fromCounter(CoursesCounter $counter): CoursesCounterIncrementedDomainEvent
    {
        return self::create($counter->id(), $counter->total());
    }
}
