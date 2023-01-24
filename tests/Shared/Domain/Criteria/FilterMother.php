<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Domain\Criteria;

use Pokedex\Shared\Domain\Criteria\Filter;
use Pokedex\Shared\Domain\Criteria\FilterField;
use Pokedex\Shared\Domain\Criteria\FilterOperator;
use Pokedex\Shared\Domain\Criteria\FilterValue;

final class FilterMother
{
    public static function create(
        ?FilterField $field = null,
        ?FilterOperator $operator = null,
        ?FilterValue $value = null
    ): Filter {
        return new Filter(
            $field ?? FilterFieldMother::create(),
            $operator ?? FilterOperator::random(),
            $value ?? FilterValueMother::create()
        );
    }

    /** @param string[] $values */
    public static function fromValues(array $values): Filter
    {
        return Filter::fromValues($values);
    }
}
