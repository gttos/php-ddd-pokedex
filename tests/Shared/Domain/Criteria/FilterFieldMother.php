<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Domain\Criteria;

use Pokedex\Shared\Domain\Criteria\FilterField;
use Pokedex\Tests\Shared\Domain\WordMother;

final class FilterFieldMother
{
    public static function create(?string $fieldName = null): FilterField
    {
        return new FilterField($fieldName ?? WordMother::create());
    }
}
