<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Courses\Domain;

use Pokedex\Shared\Domain\Criteria\Criteria;
use Pokedex\Tests\Shared\Domain\Criteria\CriteriaMother;
use Pokedex\Tests\Shared\Domain\Criteria\FilterMother;
use Pokedex\Tests\Shared\Domain\Criteria\FiltersMother;

final class BackofficeCourseCriteriaMother
{
    public static function nameContains(string $text): Criteria
    {
        return CriteriaMother::create(
            FiltersMother::createOne(
                FilterMother::fromValues(
                    [
                        'field'    => 'name',
                        'operator' => 'CONTAINS',
                        'value'    => $text,
                    ]
                )
            )
        );
    }
}
