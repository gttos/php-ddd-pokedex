<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Auth\Application\Authenticate;

use Pokedex\Backoffice\Auth\Domain\AuthPassword;
use Pokedex\Backoffice\Auth\Domain\AuthUsername;
use Pokedex\Shared\Domain\Bus\Command\CommandHandler;

final class AuthenticateUserCommandHandler implements CommandHandler
{
    public function __construct(private readonly UserAuthenticator $authenticator)
    {
    }

    public function __invoke(AuthenticateUserCommand $command): void
    {
        $username = new AuthUsername($command->username());
        $password = new AuthPassword($command->password());

        $this->authenticator->authenticate($username, $password);
    }
}
