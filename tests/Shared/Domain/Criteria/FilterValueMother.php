<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Domain\Criteria;

use Pokedex\Shared\Domain\Criteria\FilterValue;
use Pokedex\Tests\Shared\Domain\WordMother;

final class FilterValueMother
{
    public static function create(?string $value = null): FilterValue
    {
        return new FilterValue($value ?? WordMother::create());
    }
}
