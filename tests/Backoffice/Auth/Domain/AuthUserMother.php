<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Auth\Domain;

use Pokedex\Backoffice\Auth\Application\Authenticate\AuthenticateUserCommand;
use Pokedex\Backoffice\Auth\Domain\AuthPassword;
use Pokedex\Backoffice\Auth\Domain\AuthUser;
use Pokedex\Backoffice\Auth\Domain\AuthUsername;

final class AuthUserMother
{
    public static function create(?AuthUsername $username = null, ?AuthPassword $password = null): AuthUser
    {
        return new AuthUser($username ?? AuthUsernameMother::create(), $password ?? AuthPasswordMother::create());
    }

    public static function fromCommand(AuthenticateUserCommand $command): AuthUser
    {
        return self::create(
            AuthUsernameMother::create($command->username()),
            AuthPasswordMother::create($command->password())
        );
    }
}
