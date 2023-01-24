<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Auth\Domain;

use Pokedex\Shared\Domain\ValueObject\StringValueObject;

final class AuthPassword extends StringValueObject
{
    public function isEquals(AuthPassword $other): bool
    {
        return $this->value() === $other->value();
    }
}
