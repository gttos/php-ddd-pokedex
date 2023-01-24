<?php

declare(strict_types=1);

namespace Pokedex\Shared\Domain\Criteria;

use Pokedex\Shared\Domain\ValueObject\Enum;
use InvalidArgumentException;

/**
 * @method static OrderType asc()
 * @method static OrderType desc()
 * @method static OrderType none()
 */
final class OrderType extends Enum
{
    public const ASC  = 'asc';
    public const DESC = 'desc';
    public const NONE = 'none';

    public function isNone(): bool
    {
        return $this->equals(self::none());
    }

    protected function throwExceptionForInvalidValue($value): never
    {
        throw new InvalidArgumentException($value);
    }
}
