<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Auth\Domain;

use Pokedex\Backoffice\Auth\Domain\AuthUsername;
use Pokedex\Tests\Shared\Domain\WordMother;

final class AuthUsernameMother
{
    public static function create(?string $value = null): AuthUsername
    {
        return new AuthUsername($value ?? WordMother::create());
    }
}
