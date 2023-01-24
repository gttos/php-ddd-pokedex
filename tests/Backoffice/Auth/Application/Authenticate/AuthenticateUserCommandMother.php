<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Auth\Application\Authenticate;

use Pokedex\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommand;
use Pokedex\Backoffice\Auth\Domain\AuthPassword;
use Pokedex\Backoffice\Auth\Domain\AuthUsername;
use Pokedex\Tests\Backoffice\Auth\Domain\AuthPasswordMother;
use Pokedex\Tests\Backoffice\Auth\Domain\AuthUsernameMother;

final class AuthenticateUserCommandMother
{
    public static function create(
        ?AuthUsername $username = null,
        ?AuthPassword $password = null
    ): AuthenticateUserCommand {
        return new AuthenticateUserCommand(
            $username?->value() ?? AuthUsernameMother::create()->value(),
            $password?->value() ?? AuthPasswordMother::create()->value()
        );
    }
}
