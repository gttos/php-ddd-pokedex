<?php

declare(strict_types=1);

namespace Pokedex\Backoffice\Auth\Application\Authenticate;

use Pokedex\Backoffice\Auth\Domain\AuthPassword;
use Pokedex\Backoffice\Auth\Domain\AuthRepository;
use Pokedex\Backoffice\Auth\Domain\AuthUser;
use Pokedex\Backoffice\Auth\Domain\AuthUsername;
use Pokedex\Backoffice\Auth\Domain\InvalidAuthCredentials;
use Pokedex\Backoffice\Auth\Domain\InvalidAuthUsername;

final class UserAuthenticator
{
    public function __construct(private readonly AuthRepository $repository)
    {
    }

    public function authenticate(AuthUsername $username, AuthPassword $password): void
    {
        $auth = $this->repository->search($username);

        $this->ensureUserExist($auth, $username);
        $this->ensureCredentialsAreValid($auth, $password);
    }

    private function ensureUserExist(?AuthUser $auth, AuthUsername $username): void
    {
        if (null === $auth) {
            throw new InvalidAuthUsername($username);
        }
    }

    private function ensureCredentialsAreValid(AuthUser $auth, AuthPassword $password): void
    {
        if (!$auth->passwordMatches($password)) {
            throw new InvalidAuthCredentials($auth->username());
        }
    }
}
