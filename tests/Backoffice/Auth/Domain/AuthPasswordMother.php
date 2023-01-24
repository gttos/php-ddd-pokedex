<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Auth\Domain;

use Pokedex\Backoffice\Auth\Domain\AuthPassword;
use Pokedex\Tests\Shared\Domain\UuidMother;

final class AuthPasswordMother
{
    public static function create(?string $value = null): AuthPassword
    {
        return new AuthPassword($value ?? UuidMother::create());
    }
}
