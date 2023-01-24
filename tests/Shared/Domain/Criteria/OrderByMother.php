<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Domain\Criteria;

use Pokedex\Shared\Domain\Criteria\OrderBy;
use Pokedex\Tests\Shared\Domain\WordMother;

final class OrderByMother
{
    public static function create(?string $fieldName = null): OrderBy
    {
        return new OrderBy($fieldName ?? WordMother::create());
    }
}
