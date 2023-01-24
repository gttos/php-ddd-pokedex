<?php

declare(strict_types=1);

namespace Pokedex\Tests\Backoffice\Auth;

use Pokedex\Backoffice\Auth\Domain\AuthRepository;
use Pokedex\Backoffice\Auth\Domain\AuthUser;
use Pokedex\Backoffice\Auth\Domain\AuthUsername;
use Pokedex\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class AuthModuleUnitTestCase extends UnitTestCase
{
    private AuthRepository|MockInterface|null $repository;

    protected function shouldSearch(AuthUsername $username, AuthUser $authUser = null): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($username))
            ->once()
            ->andReturn($authUser);
    }

    protected function repository(): AuthRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(AuthRepository::class);
    }
}
