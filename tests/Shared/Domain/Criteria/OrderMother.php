<?php

declare(strict_types=1);

namespace Pokedex\Tests\Shared\Domain\Criteria;

use Pokedex\Shared\Domain\Criteria\Order;
use Pokedex\Shared\Domain\Criteria\OrderBy;
use Pokedex\Shared\Domain\Criteria\OrderType;

final class OrderMother
{
    public static function create(?OrderBy $orderBy = null, ?OrderType $orderType = null): Order
    {
        return new Order($orderBy ?? OrderByMother::create(), $orderType ?? OrderType::random());
    }

    public static function none(): Order
    {
        return Order::none();
    }
}
